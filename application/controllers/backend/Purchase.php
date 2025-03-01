<?php
class Purchase extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Users_model','Coin_plan_model','Setting_model','DepositBonus_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Purchase History Management',
            'AllPurchase' => $this->Users_model->Purchase_History(),
            // 'ManualPurchase' => $this->Users_model->ManualPurchase_History(),
            'PendingManualPurchase' => $this->Users_model->ManualPurchase_History(0),
            'ApprovedManualPurchase' => $this->Users_model->ManualPurchase_History(1),
            'RejectedManualPurchase' => $this->Users_model->ManualPurchase_History(2),
        ];
        template('Purchase/index', $data);
    }
    public function offline(){
        $data = [
            'title' => 'Purchase History Offline',
            'AllPurchase' => $this->Users_model->Purchase_History_Offline()
        ];
        template('Purchase/offline', $data);
    }
    public function robot(){
        $data = [
            'title' => 'Purchase History robot',
            'AllPurchase' => $this->Users_model->Purchase_History_Robot()
        ];
        template('Purchase/robot', $data);
    }

    // public function ChangeStatus()
    // {
    //     $id = $this->input->post('id');
    //     $status = $this->input->post('status');
    //     $Change = $this->Users_model->PurchaseChangeStatus($id, $status);
    //      if ($Change) {
    //         if($status==1){
    //         $order_details = $this->Coin_plan_model->GetUserByOrderId($id);
    //         log_statement ($order_details[0]->user_id, DEPOSIT, $order_details[0]->coin,0,0);
    //         //cross check if your local payment already done
    //         // if ($order_details[0]->status==1 && $order_details[0]->payment==0) {
    //             //update local payment status
    //             // $total_amount=$this->Coin_plan_model->GetTotalAmountByUser($order_details[0]->user_id);
    //             // $category=$this->Coin_plan_model->GetUserCategoryByAmount($total_amount+$order_details[0]->coin);
    
    //             // $category_id = (empty($category)) ? 0 : $category->id;
    //             // $category_amount = (empty($category)) ? 0 : $order_details[0]->coin*($category->percentage/100);
    
    //             // $this->Coin_plan_model->UpdateOrderPaymentStatus($id);
    //             // $this->Users_model->UpdateWalletOrder($order_details[0]->coin+$category_amount, $order_details[0]->user_id);
    
    //             // $this->Users_model->UpdateSpin($order_details[0]->user_id, ceil($order_details[0]->amount/100), $category_id);
    
    //             $user = $this->Users_model->UserProfile($order_details[0]->user_id);
    //             $setting = $this->Setting_model->Setting();
    //             for ($i=1; $i <= 3; $i++) {
    //                 if ($user[0]->referred_by!=0) {
    //                     $level = 'level_'.$i;
    //                     $coins = (($order_details[0]->coin*$setting->$level)/100);
    //                     $this->Users_model->UpdateWalletOrder($coins, $user[0]->referred_by, bonus: 1);
    //                     log_statement ($user[0]->referred_by, REFERRAL_BONUS,$coins,0,0);
    //                     $log_data = [
    //                         'user_id' => $user[0]->referred_by,
    //                         'purchase_id' => $order_details[0]->id,
    //                         'purchase_user_id' => $order_details[0]->user_id,
    //                         'coin' => $coins,
    //                         'level' => $i,
    //                     ];
    
    //                     $this->Users_model->AddPurchaseReferLog($log_data);
    //                     $user = $this->Users_model->UserProfile($user[0]->referred_by);
    //                 } else {
    //                     break;
    //                 }
    //             }  
    //         }          
    //         $data = ['msg' => 'Status Change Successfully','class' => 'success'];
    //     } else {
    //         $data = ['msg' => 'Something went to wrong','class' => 'error'];
    //     }
    //     echo json_encode($data);
    // }
   

    public function ChangeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $Change = $this->Users_model->PurchaseChangeStatus($id, $status);
        $setting = $this->Setting_model->Setting();
        if ($Change) {
            if ($status == 1) {
                $order_details = $this->Coin_plan_model->GetUserByOrderId($id);
                log_statement($order_details[0]->user_id, DEPOSIT, $order_details[0]->coin, 0, 0);
                $purchase_count = $this->Users_model->getNumberOfPurchase($order_details[0]->user_id);
                $user = $this->Users_model->UserProfile($order_details[0]->user_id);
                switch ($purchase_count) {
                    case 1:
                        if (!empty($user[0]->referred_by)) {
                            $this->Users_model->UpdateWallet($user[0]->referred_by, $setting->referral_amount,$order_details[0]->user_id);
                            if($setting->referral_amount>0){
                                direct_admin_profit_statement(REFERRAL_BONUS,-$setting->referral_amount,$user[0]->referred_by);
                                log_statement ($user[0]->referred_by, REFERRAL_BONUS, $setting->referral_amount,0,0);
                            }
                        }
                        depositBonus($order_details[0]->coin, $order_details[0]->id, $order_details[0]->user_id, $user[0]->referred_by, '1st Deposit Bonus',1);
                        break;
                    case 2:
                        depositBonus($order_details[0]->coin, $order_details[0]->id, $order_details[0]->user_id, $user[0]->referred_by, '2nd Deposit Bonus',2);
                        break;
                    case 3:
                        depositBonus($order_details[0]->coin, $order_details[0]->id, $order_details[0]->user_id, $user[0]->referred_by, '3rd Deposit Bonus',3);
                        break;
                    case 4:
                        depositBonus($order_details[0]->coin, $order_details[0]->id, $order_details[0]->user_id, $user[0]->referred_by, '4th Deposit Bonus',4);
                        break;
                    case 5:
                        depositBonus($order_details[0]->coin, $order_details[0]->id, $order_details[0]->user_id, $user[0]->referred_by, '5th Deposit Bonus',5);
                        break;
                    default:
                        break;
                }

                
                for ($i = 1; $i <= 5; $i++) {
                    if ($user[0]->referred_by != 0) {
                        $level = 'level_' . $i;
                        $coins = (($order_details[0]->coin * $setting->$level) / 100);
                        $this->Users_model->UpdateWalletOrder($coins, $user[0]->referred_by, bonus: 1);
                        log_statement($user[0]->referred_by, REFERRAL_BONUS, $coins, 0, 0);
                        $log_data = [
                            'user_id' => $user[0]->referred_by,
                            'purchase_id' => $order_details[0]->id,
                            'purchase_user_id' => $order_details[0]->user_id,
                            'coin' => $coins,
                            'level' => $i,
                        ];

                        $this->Users_model->AddPurchaseReferLog($log_data);
                        $user = $this->Users_model->UserProfile($user[0]->referred_by);
                    } else {
                        break;
                    }
                }
            }
            $data = ['msg' => 'Status Change Successfully', 'class' => 'success'];
        } else {
            $data = ['msg' => 'Something went to wrong', 'class' => 'error'];
        }
        echo json_encode($data);
    }

}
