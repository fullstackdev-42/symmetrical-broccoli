<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('type') == "user")
    		redirect('/user/account');

		$this->load->model("User_model", "users", true);

		$content['users'] = $this->users->get_user("2 > 1");

		$data['admin_tab'] = 'USERS';
		$this->load->view('admin/admin_header', $data);
		$this->load->view('admin/user', $content);
	}

	public function delete(){
		//delete user from DB based on his id
		$user_id = $this->input->post("user_id");
		$username = $this->input->post("username");

		$condition = array(
			"user_id" => $user_id
		);

		$this->load->model("User_model", "users", true);

		$this->users->delete($condition);

		$toast = array('state' => true, 'msg' => $username.' is Deleted Successfully!');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function update(){
		//update user data when admin edits user info
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post("lastname");
		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$dateofbirth = $this->input->post("dateofbirth");
		$usertype = $this->input->post("usertype");
		$user_id = $this->input->post("user_id");

		$this->load->model("User_model", "users", true);

		$update_flag = $this->users->update_check($user_id, $username);
		if($update_flag==true){
			$toast = array('state' => 'error', 'msg' =>'The given username already exists');
			$this->session->set_flashdata('toast', $toast);

			$res   = array('state' => false, 'msg' => 'The given username already exists');
		}else{
			$data = array(
				"username" => $username,
				"email" => $email,
				"FirstName" => $firstname,
				"LastName" => $lastname,
				"DateOfBirth" => $dateofbirth,
				"user_type" => $usertype
			);

			$this->users->update($data, $user_id);
					
			$toast = array('state' => true, 'msg' => $username.' is Updated Successfully!');
			$this->session->set_flashdata('toast', $toast);

			$res   = array('state' => true, 'msg' => 'User updated successfully.');
		}
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));
	}
}
