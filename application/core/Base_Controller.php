<?php

class Base_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');

		if ($this->session->userdata('logged_in') == true)
        {
            //do something
        }
        else
        {
        	/*if( current_url() !="/" && current_url() !="/user" && current_url()!="/user/index" && current_url()!="/user/user_register" && current_url()!="/user/login"){
        		redirect('/');
        	}*/            
        }   
	}
}

?>