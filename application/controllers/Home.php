<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('AuthenticationModel');
    }

    public function index()
	{

	    $data['msg']='';
	    $this->load->view('Admin/LoginPage',$data);
	}
	public function CheckAuthetication()
    {
        $data['client_id']=$this->input->post('login_id');
        $data['client_password']=$this->input->post('password');
        $result=$this->AuthenticationModel->CheckAuthetication($data);
        if(!empty($result->client_id))
        {
            $this->session->set_userdata('client_id',$result->client_id);
            $this->session->set_userdata('client_phone',$result->client_phone);
            $this->session->set_userdata('client_name',$result->client_name);
            $this->session->set_userdata('client_role',$result->client_role);
            if($result->client_role=='admin')
                redirect('/Admin/AdminDashboard');
            else
                redirect('/Dashboard');
        }
        else
        {
            redirect('?msg=false');
        }
    }

}
