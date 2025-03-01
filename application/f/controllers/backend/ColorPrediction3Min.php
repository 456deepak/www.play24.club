<?php
class ColorPrediction3Min extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ColorPrediction3Min_model','Users_model']);
    }

    public function index()
    {
        $startDate = $this->input->get('start_date');
        $endDate = $this->input->get('end_date');
        $AllGames = $this->ColorPrediction3Min_model->AllGames($startDate, $endDate);
        $RandomFlag = $this->ColorPrediction3Min_model->getRandomFlag('color_prediction_3_min_random');
        // foreach ($AllGames as $key => $value) {
        //     $AllGames[$key]->details=$this->ColorPrediction3Min_model->ViewBet('',$value->id);
        // }
        // echo '<pre>';print_r($AllGames);die;
        $data = [
            'title' => 'Color Predection 3 Min History',
            'AllGames' => $AllGames,
            'RandomFlag'=>$RandomFlag->color_prediction_3_min_random
        ];
        template('color_prediction_3_min/index', $data);
    }

    public function color_prediction_bet($id){

        $AllUsers = $this->ColorPrediction3Min_model->ViewBet('',$id);
        foreach ($AllUsers as $key => $value) {
            $user_details= $this->Users_model->UserProfile($value->user_id);
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
        template('color_prediction_3_min/show_details', $data);
    }
    public function ChangeStatus() {
        
        $Change = $this->ColorPrediction3Min_model->ChangeStatus();
        if ( $Change ) {
            echo 'true';
        } else {
            echo 'false';
        }
       
    }
}
