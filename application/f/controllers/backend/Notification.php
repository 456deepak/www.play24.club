<?php
class Notification extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model');
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Notification',
            'AllNotification' => $this->Notification_model->List()
        ];
        $data['SideBarbutton'] = ['backend/Notification/add', 'Add Notification'];
        template('notification/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Send Notification'
        ];

        template('notification/add', $data);
    }

    public function insert()
    {
        $data = [
            'msg' => $this->input->post('msg'),
            'added_date' => date('Y-m-d H:i:s A')
        ];

        $Noti = $this->Notification_model->Add($data);
        if ($Noti) {
            $userdata = $this->Users_model->AllUserList();
            // print_r($userdata);
            $users_fcm = array();
            foreach ($userdata as $value) {

                if(!empty($value->fcm)) {
                    $users_fcm[] = $value->fcm;
                }
            }

            if(!empty($users_fcm)) {
                $data['msg'] = "";
                $data['title'] = $this->input->post('msg');
                push_notification_android($users_fcm, $data);
            }

            $this->session->set_flashdata('msg', array('message' => 'Notification Sent Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Notification');
    }

    public function delete($id)
    {
        if ($this->Notification_model->update(array('isDeleted' => true), $id)) {
            $this->session->set_flashdata('msg', array('message' => 'Image Deleted Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Notification');
    }

}