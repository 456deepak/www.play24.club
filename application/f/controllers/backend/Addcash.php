<?php
class  AddCash extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AddCash_model');
    }

    public function index()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data = [
            'title' => 'Withdrawal Log',
            'Pending' => $this->AddCash_model->WithDrawal_list(0,$start_date, $end_date),
            'Approved' => $this->AddCash_model->WithDrawal_list(1,$start_date, $end_date),
            'Rejected' => $this->AddCash_model->WithDrawal_list(2,$start_date, $end_date)
        ];
        template('redeem/addcash', $data);
    }

     public function ChangeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $Change = $this->AddCash_model->ChangeStatus($id, $status);
         if ($Change) {
            $data = ['msg' => 'Status Change Successfully','class' => 'success'];
        } else {
            $data = ['msg' => 'Something went to wrong','class' => 'error'];
        }
        echo json_encode($data);
    }

    public function ChangeStatusAddCash()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $updated_date = date('Y-m-d H:i:s');
       
        
        $Change = $this->AddCash_model->ChangeStatusAddCash($id, $status,$updated_date);
         if ($Change) {
            $data = ['msg' => 'Status Change Successfully','class' => 'success'];
        } else {
            $data = ['msg' => 'Something went to wrong','class' => 'error'];
        }
        echo json_encode($data);
    }

    public function ReedemNow()
    {
        $data = [
            'title' => 'Redeem List',
            'AllRedeem' => $this->AddCash_model->AllRedeemList()
        ];
        $data['SideBarbutton'] = ['backend/WithdrawalLog/add', 'Add'];
        template('redeem/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Redeem',
        ];
        template('redeem/add', $data);
    }

    public function insert()
    {
        $RedeemData = [
            'title' => $this->input->post('title'),
            'coin' => $this->input->post('coin'),
            'amount' => $this->input->post('amount')
        ];
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './data/Redeem/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/WithdrawalLog/Add');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
                $RedeemData['img'] = $img;
            }
        }

        $InsertRedeem = $this->AddCash_model->Insert($RedeemData);
        if ($InsertRedeem) {
            $this->session->set_flashdata('msg', array('message' => 'Redeem Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/WithdrawalLog/ReedemNow');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Redeem',
            'Redeem' => $this->AddCash_model->getRedeem($id),
        ];
        $this->form_validation->set_rules('img', 'Image', 'required');
        if ($this->form_validation->run() == false)
            template('redeem/edit', $data);
    }

    public function update()
    {
        $Redeem_id = $this->input->post('Redeem_id');
        // print_r($Redeem_id); exit;
        $RedeemData = [
            'title' => $this->input->post('title'),
            'coin' => $this->input->post('coin'),
            'amount' => $this->input->post('amount'),
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $img = '';
        if (!empty($_FILES["img"]['name'])) {
            $config['upload_path'] = './data/Redeem/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '10000';
            //            $config['max_width'] = '2000';
            //            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {

                $error = array('error' => $this->upload->display_errors());

                $this->session->set_flashdata('msg', array('message' => $error['error'], 'class' => 'error', 'position' => 'top-right'));
                redirect('backend/WithdrawalLog/');
            } else {

                $file = $this->upload->data();
                $img = $file['file_name'];
                $RedeemData['img'] = $img;
            }
        }

        $UpdateRedeem = $this->AddCash_model->update($Redeem_id, $RedeemData);
        if ($UpdateRedeem) {
            $this->session->set_flashdata('msg', array('message' => 'Redeem Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/WithdrawalLog/ReedemNow');
    }

    public function delete($id)
    {
        if ($this->AddCash_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Redeem Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/WithdrawalLog/ReedemNow');
    }

}