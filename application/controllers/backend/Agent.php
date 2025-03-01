<?php

class Agent extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Agent_model','Users_model','AgentUser_model']);
    }

    public function index()
    {
        $data = [
            'title' => 'Agent Management',
            'AllAgent' => $this->Agent_model->AllAgentList()
        ];
        $data['SideBarbutton'] = ['backend/Agent/add', 'Add Agent'];
        template('agent/index', $data);
    }

    public function users($id)
    {
        $data = [
            'title' => 'Agent Management',
            'AllAgent' => $this->AgentUser_model->AllAgentUserList($id)
        ];
        // $data['SideBarbutton'] = ['backend/Agent/add', 'Add Agent'];
        template('agent/users', $data);
    }



    public function add()
    {
        $data = [
            'title' => 'Add Agent'
        ];

        template('agent/add', $data);
    }

    public function insert()
    {
       $email = $this->input->post('email');
       // Check if email already exists
       $email_exists = $this->Agent_model->checkEmailExists($email);

       if ($email_exists) {
       $this->session->set_flashdata('msg', array('message' => 'Email ID already exists', 'class' => 'error', 'position' => 'top-right'));
       redirect('backend/Agent/add');
       } else {
    // Email doesn't exist, proceed with adding agent
         $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_id' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'sw_password' => md5($this->input->post('password')),
            'mobile' => $this->input->post('mobile'),
            'role' => 2,
            'created_date' => date('Y-m-d H:i:s')
        ];
        $agent = $this->Agent_model->Addagent($data);
        if ($agent) {
            $this->session->set_flashdata('msg', array('message' => 'Agent Added Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Agent');
    }
}

    public function edit_Agent($id)
    {
        $data = [
            'title' => 'Edit Agent',
            'agent' => $this->Agent_model->AgentDetails($id)
        ];
        // echo '<pre>';print_r($data);die;
        template('agent/edit', $data);
    }

    public function edit_wallet($id)
    {
       $data = [
            'title' => 'Add Wallet Amount',
            'User' => $this->Agent_model->UserAgentProfile($id)
        ];
        // echo '<pre>';print_r($data);die;
        template('agent/agentadd_wallet', $data); 
    }

    public function deduct_wallet($id)
    {
        $data = [
            'title' => 'Deduct Wallet Amount',
            'User' => $this->Agent_model->UserAgentProfile($id)
        ];

        template('agent/deduct_wallet', $data);
    }

    public function update_wallet()
    {
        $user = $this->Agent_model->UpdateWalletOrder($this->input->post('amount'), $this->input->post('user_id'));
        if ($user) {
            $user = $this->Agent_model->WalletLog($this->input->post('amount'), $this->input->post('user_id'));
            $this->session->set_flashdata('msg', array('message' => 'Agent Wallet Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Agent');
    }



    public function update_deduct_wallet()
    {
        
        $user = $this->Agent_model->DeductWalletOrder($this->input->post('amount'), $this->input->post('user_id'));
        if ($user) {
            $user = $this->Agent_model->WalletLog('-'.$this->input->post('amount'), $this->input->post('user_id'));
            $this->session->set_flashdata('msg', array('message' => 'Agent Wallet Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Agent');
    }


  

    public function update_Agent()
    {
        $password = $this->input->post('password');
        $md5Password = md5($password); // Convert password to MD5 hash
        $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'password' => $password, // Store original password in 'password' column
            'sw_password' => $md5Password, // Store MD5 hashed password in 'sw_password' column
            'email_id' => $this->input->post('email_id'),
            'mobile' => $this->input->post('mobile'),
        ];
        // print_r($data);die;
        $agent = $this->Agent_model->Updateagent($this->input->post('agent_id'), $data);
        if ($agent) {
            $this->session->set_flashdata('msg', array('message' => 'Agent Updated Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Agent');
    }

    public function delete($id)
    {
        if ($this->Agent_model->Delete($id)) {
            $this->session->set_flashdata('msg', array('message' => 'Agent Removed Successfully', 'class' => 'success', 'position' => 'top-right'));
        } else {
            $this->session->set_flashdata('msg', array('message' => 'Somthing Went Wrong', 'class' => 'error', 'position' => 'top-right'));
        }
        redirect('backend/Agent');
    }
    public function view($user_id)
    {
        $data = [
            'title' => 'View Logs',     
            'AllWalletLog' => $this->Agent_model->View_WalletLog($user_id),
        ];
        // echo '<pre>';print_r($data);die;
        template('agent/view', $data);
    }

}