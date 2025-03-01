<?php
class DragonTiger extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['DragonTiger_model','Users_model']);
    }

    public function index()
    {
        $AllGames = $this->DragonTiger_model->AllGames();
        $RandomFlag = $this->DragonTiger_model->getRandomFlag('dragon_tiger_random');
        // foreach ($AllGames as $key => $value) {
        //     $AllGames[$key]->details=$this->DragonTiger_model->ViewBet('',$value->id);
        // }
        // echo '<pre>';print_r($AllGames);die;
        $data = [
            'title' => 'Dragon Tiger History',
            'AllGames' => $AllGames,
            'RandomFlag'=>$RandomFlag->dragon_tiger_random
        ];
        template('dragon_tiger/index', $data);
    }

    public function dragon_bet($id){

        $AllUsers = $this->DragonTiger_model->ViewBet('',$id);
        foreach ($AllUsers as $key => $value) {
            $user_details= $this->Users_model->UserProfile($value->user_id);
            $AllUsers[$key]->user_name='';
            if($user_details){
                $AllUsers[$key]->user_name=$user_details[0]->name;
            }else{
                $AllUsers[$key]->user_name='';
            }
        }
        $data = [
            'title' => 'Game History',
            'AllUsers' => $AllUsers
        ];
        template('dragon_tiger/show_details', $data);
    }
    public function ChangeStatus() {
        
        $Change = $this->DragonTiger_model->ChangeStatus();
        if ( $Change ) {
            echo 'true';
        } else {
            echo 'false';
        }
       
    }

    public function Gethistory()
    {
        // error_reporting(-1);
        // ini_set('display_errors', 1);
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->DragonTiger_model->Gethistory($postData);

        echo json_encode($data);
    }

}
