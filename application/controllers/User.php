<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		$this->load->view('user/login_view');
	}

	public function user_register()
	{
		$this->load->view('user/register_view');
	}
	//check the username and password and log the user in if the user info is correct
	public function login()
	{	
		$this->load->model("User_model","user", true);
		$this->load->library('form_validation');
		//Form validation - codeigniter provides you with powerful form validation functionality
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	$type = $this->user->login($username, $password);
        	
			if ($type == "user" ) {

				$res   = array('state' => true, 'type' => $type, 'msg' => 'Welcome to the Meal Hub!');
				$toast = array('state' => true, 'msg' => 'Welcome to the Meal Hub!');
				$this->session->set_flashdata('toast', $toast);

			}else if($type == "admin"){
				$res   = array('state' => true, 'type' => $type, 'msg' => 'Welcome to the Foodbank!');
				$toast = array('state' => true, 'msg' => 'Welcome to the Foodbank!');
				$this->session->set_flashdata('toast', $toast);
			}

			 else if ($type == -1) {
				$msg = "Wrong Password.";
				$res = array('state' => false, 'msg' => $msg);
			} else {
				$msg = "Wrong Username";
				$res = array('state' => false, 'msg' => $msg);
			}
        }
      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));		
	}
	//register user and take him to the user/account page
	public function register()
	{
		//form validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'FirstName', 'required');
		$this->form_validation->set_rules('lastname', 'LastName', 'required');
		$this->form_validation->set_rules('birthday', 'Date of Birth', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('rpassword', 'confirm password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	//if there's no error in validation, save the user info in DB
        	$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$birthday = $this->input->post("birthday");
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$password = $this->input->post("rpassword");
			$user_type = $this->input->post("user_type");
			if($user_type==""){
				$user_type = "user";
				$res   = array('state' => true, 'msg' => 'Welcome to the Meal Hub!');
				$toast = array('state' => true, 'msg' => 'Welcome to the Meal Hub!');
			}else{
				$res   = array('state' => true, 'msg' => 'User created successfully.');
				$toast = array('state' => true, 'msg' => 'User Created successfully!');
			}

			$data = array(
				"username" => $username,
				"email" => $email,
				"password" => md5($password),
				"FirstName" => $firstname,
				"LastName" => $lastname,
				"DateOfBirth" => $birthday,
				"user_type" => $user_type
			);			
			//Load user_model
			$this->load->model("User_model", "user", true);
			//Call register function in user_model to save a data
			$user_id = $this->user->register($data);
			
			$this->session->set_flashdata('toast', $toast);

			if ($this->input->post("register_flag")=='register'){
				//Store this data in session
				$newdata = array(
			        'username'  => $username,
			        'user_id'     => $user_id,
			        'user_type' => $user_type,
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
			}
        }      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));		
	}

	public function update(){
		//get data from ajax
		$user_id = $this->input->post("user_id");
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post("lastname");
		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$birthday = $this->input->post("birthday");
		//load user_model and update user info in DB
		$this->load->model("/User_model", "users", true);
		$update_flag = $this->users->update_check($user_id, $username);
		if($update_flag==true){
			$res   = array('state' => false, 'msg' => 'Username already exists.');
		}else{

			$data = array(
				"username" => $username,
				"email" => $email,
				"FirstName" => $firstname,
				"LastName" => $lastname,
				"DateOfBirth" => $birthday
			);
			//call update function in user_model
			$this->users->update($data, $user_id);

			$this->session->set_userdata("username", $username);
						
			$toast = array('state' => true, 'msg' => $username.' is Updated Successfully!');
			$this->session->set_flashdata('toast', $toast);

			$res   = array('state' => true, 'msg' => 'User updated successfully.');
		}
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
		
	}

	public function logout(){
		//when user clicks log out button, delete all session data and log him out
		$this->session->unset_userdata('username');
		$this->session->unset_userdata("user_id");
		$this->session->unset_userdata("user_type");
		$this->session->unset_userdata("logged_in");
		redirect('/getfit/');
	}

	public function username_check($str){
		//this function is for checking the existance of username when he wants to register or update newly 
		$this->load->model("User_model","user", true);
        $this->db->where('username', $str);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
        	$this->form_validation->set_message('username_check', 'The given username already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
