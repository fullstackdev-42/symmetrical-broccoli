<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('type') == "admin")
    		redirect('/admin/ingredient');

    	$data['user_tab'] = 'PROFILE';
        $user_id = $this->session->userdata('user_id');
        //load profile_model
        $this->load->model("user/Profile_model", "profile", true);
        //profile_flag is used in view for displaying only one of "create" and "update" button
        $content['profile_flag'] = $this->profile->get_profile($user_id);
        $content['profile'] = $this->profile->get_profile_details($user_id);
        //get all activities from DB-some simple queries can be run not in models
        $this->db->select('*');
        $this->db->from('activity');
        $query = $this->db->get();
        $content['activities'] = $query->result();
        //get all goals for daily mealplan
        $this->db->select('*');
        $this->db->from('goal');
        $query = $this->db->get();
        $content['goals'] = $query->result();
        //get all diettypes
        $this->load->model("admin/Diet_model", "diet", true);
        $content['diet_types'] = $this->diet->get_diet_types();

    	$this->load->view('user/user_header', $data);
        //send all variables stored in $content to the user/profile view
    	$this->load->view('user/profile', $content);
	}

    public function add(){
        //get all necessary data from ajax in user/profile.js
        $user_id = $this->session->userdata('user_id');
        $weight = $this->input->post("weight");
        $height = $this->input->post("height");
        $age = $this->input->post("age");
        $sex = $this->input->post("sex");
        $activity = $this->input->post("activity");
        $goal = $this->input->post("goal");
        $tdcal = $this->input->post("tdcal");
        $profileProtein = $this->input->post("profileProtein");
        $profileFat = $this->input->post("profileFat");
        $profileCarbs = $this->input->post("profileCarbs");
        $diet_types = $this->input->post("diet_types");

        $this->load->model("user/Profile_model", "profile", true);
        $edit_flag = $this->profile->get_profile($user_id);
        //if user profile already exists and he wants to edit his profile, delete previous profile data from DB and insert newly
        if($edit_flag==true){
            $this->profile->delete($user_id);
        }        

        $data = array(
            "weight" => $weight,
            "height" => $height,
            "age" => $age,
            "activity" => $activity,
            "goal" => $goal,
            "profileProtein" => $profileProtein,
            "profileFat" => $profileFat,
            "profileCarbs" => $profileCarbs,
            "profileCal" => $tdcal,
            "user_id" => $user_id,
            "sex" => $sex
        );

        $profile_id = $this->profile->add($data);
        //get diet_types added in profile and insert into profile_has_diettype table
        $length = strlen($diet_types);
        if($length!=0){
            for($i=0; $i<($length+1)/2; $i++){
                $diet_id = substr($diet_types, $i*2, 1);
                $data = array(
                    'Profile_profile_id' => $profile_id,
                    'DietType_diet_id' => $diet_id
                );
                $this->db->insert('profile_has_diettype', $data);
            }
        }

        if($edit_flag==false){
            $res   = array('state' => true, 'msg' => 'Your profile is created successfully.');
            $toast = array('state' => true, 'msg' => 'Your profile is created successfully.');
            $this->session->set_flashdata('toast', $toast);
        }else{
            $res   = array('state' => true, 'msg' => 'Your profile is updated successfully.');
            $toast = array('state' => true, 'msg' => 'Your profile is updated successfully.');
            $this->session->set_flashdata('toast', $toast);
        }

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));

    }
}
