<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}
    //Get user info from database and send it to the user/account page to display user info in the table
	public function index()
	{
		if($this->session->userdata('type') == "admin")
    		redirect('/admin/ingredient');

    	$data['user_tab'] = 'ACCOUNT';

    	$user_id = $this->session->userdata('user_id');
    	$condition = array('user_id'=>$user_id);
        //load user_model
    	$this->load->model("User_model","user", true);
        //call get_user function in user_model to get user info based on the user_id
    	$content['account'] = $this->user->get_user($condition);

    	$this->load->view('user/user_header', $data);
    	$this->load->view('user/account', $content);
	}
}
