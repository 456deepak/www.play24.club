<?php

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Setting_model', 'Users_model', 'Coin_plan_model', 'AgentUser_model', 'Agent_model']);
    }

    public function index()
    {
        redirect('backend/dashboard/admin');
    }

    public function admin()
    {
        $role = $this->session->userdata("role");
        $adminId = $this->session->userdata("admin_id");
         if ($role == "2") {
            $data = [
                'title' => 'Dashboard',
                'ActiveUser' => $this->AgentUser_model->AllAgentUserList($adminId),
                
                'AdminCoins' => $this->Agent_model->getAgentBalance($adminId),
              
            ];
         }else{
            $data = [
                'title' => 'Dashboard',
                'AdminCoins' => $this->Setting_model->Setting()->admin_coin,
                'JackpotCoins' => $this->Setting_model->Setting()->jackpot_coin,
                'JackpotStatus' => $this->Setting_model->Setting()->jackpot_status,
                'RummyBotStatus' => $this->Setting_model->Setting()->robot_rummy,
                'TeenpattiBotStatus' => $this->Setting_model->Setting()->robot_teenpatti,
                'ActiveUser' => $this->Users_model->ActiveUser(),
                'AllUserList' => $this->Users_model->AllUserList(),
                'TotalCoins' => $this->Coin_plan_model->GetTotalPurchase(),
            ];
        }
        $data['role'] = $role;
        // $data['ActiveUser'];
        // exit;
        template('dashboard/manufacturer', $data);
    }
}
