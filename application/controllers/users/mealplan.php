<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mealplan extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('type') == "admin")
    		redirect('/getfit/admin/ingredient');
        //get all mealplans from DB and send them to the view-if there's no mealplan in DB, nothing will be displayed in view except "Create Mealplan" button
        $user_id = $this->session->userdata('user_id');
    	$data['user_tab'] = 'MealPlan';

        $this->load->model("user/Mealplan_model", "mealplan", true);
        $profile_id = $this->mealplan->get_profile_id($user_id);

        $content['mealplan_flag'] = $this->mealplan->get_mealplan_flag($profile_id);
        $content['mealplans'] = $this->mealplan->get_all_mealplans($profile_id);
        //get all meals from DB to display in select boxes
        $this->load->model("admin/Meal_model", "meal", true);
        $content['meals'] = $this->meal->get_all_meals();

    	$this->load->view('user/user_header', $data);
    	$this->load->view('user/mealplan', $content);
	}

    public function add(){
        //Get daily mealplan from front-end and store in DB
        $user_id = $this->session->userdata('user_id');

        $this->load->model("user/Mealplan_model", "mealplan", true);
        $profile_id = $this->mealplan->get_profile_id($user_id);

        if($profile_id=="0"){
            $res = array('state' => false, 'msg' => 'You have to create your profile first.');
        }else{
            $name = $this->input->post("name");
            $desc = $this->input->post("desc");
            date_default_timezone_set('Europe/London');
            $date = date('Y-m-d');

            $data = array(
                'name' => $name,
                'date' => $date,
                'description' => $desc,
                'profile_id' => $profile_id
            );
            //Add name, image name, method, created date into the DB and returns inserted id
            $mealplan_id = $this->mealplan->add_mealplan($data);
            //get 7*4=28 meals from creating modal and store in DB
            $monday = $this->input->post("monday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Monday',
                'breakfast' => $monday[1],
                'lunch' => $monday[2],
                'dinner' => $monday[3],
                'snack' => $monday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $tuesday = $this->input->post("tuesday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Tuesday',
                'breakfast' => $tuesday[1],
                'lunch' => $tuesday[2],
                'dinner' => $tuesday[3],
                'snack' => $tuesday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $wednesday = $this->input->post("wednesday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Wednesday',
                'breakfast' => $wednesday[1],
                'lunch' => $wednesday[2],
                'dinner' => $wednesday[3],
                'snack' => $wednesday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $thursday = $this->input->post("thursday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Thursday',
                'breakfast' => $thursday[1],
                'lunch' => $thursday[2],
                'dinner' => $thursday[3],
                'snack' => $thursday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $friday = $this->input->post("friday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Friday',
                'breakfast' => $friday[1],
                'lunch' => $friday[2],
                'dinner' => $friday[3],
                'snack' => $friday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $saturday = $this->input->post("saturday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Saturday',
                'breakfast' => $saturday[1],
                'lunch' => $saturday[2],
                'dinner' => $saturday[3],
                'snack' => $saturday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $sunday = $this->input->post("sunday");
            $data = array(
                'mealPlan_id' => $mealplan_id,
                'dayofweek' => 'Sunday',
                'breakfast' => $sunday[1],
                'lunch' => $sunday[2],
                'dinner' => $sunday[3],
                'snack' => $sunday[4]
            );
            $this->mealplan->add_dailymealplan($data);

            $res = array('state' => true, 'msg' => 'Mealplan is created successfully.');
            $toast = array('state' => true, 'msg' => 'Mealplan is created successfully.');
            $this->session->set_flashdata('toast', $toast);
        }

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }
    //This function is for get daily mealplan based on dayofweek
    public function get_dailymealplan()
    {   
        $mealplan_id = $this->input->post("mealplan_id");
        $dayofweek = $this->input->post("dayofweek");
        $condition = array(
            'mealPlan_id' => $mealplan_id,
            'dayofweek' => $dayofweek,
        );
        $this->load->model("user/Mealplan_model", "mealplan", true);
        $dailymealplan = $this->mealplan->get_dailymealplan($condition);
        if($dailymealplan == "failed"){
            $res = array('state' => false, 'msg' => 'Dailymealplan does not exist.');
        }else{
            $res=$dailymealplan;
        }
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
    }

    public function update_dailymealplan()
    {   //get meal data and update in DB when you click "edit" pencil icon and click save button 
        $category = $this->input->post("category");
        $dayofweek = $this->input->post("dayofweek");
        $mealplan_id = $this->input->post("mealplan_id");
        $meal_id = $this->input->post("meal_id");
        $data = array($category => $meal_id);
        $condition = array('dayofweek' => $dayofweek, 'mealPlan_id' => $mealplan_id);
        $this->load->model("user/Mealplan_model", "mealplan", true);
        $this->mealplan->update_dailymealplan($data, $condition);
    }

    public function get_profile()
    {   //get profilePro, profileFat, profileCarbs and profileCal
        $user_id = $this->session->userdata('user_id');
        $this->load->model("user/Profile_model", "profile", true);
        $profile = $this->profile->get_profile_details($user_id);

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($profile));
    }

    public function get_all_meals()
    {   // get all meals to show in select boxes
        $this->load->model("admin/Meal_model", "meal", true);
        $meals = $this->meal->get_all_meals();

        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($meals));
    }

    public function delete_mealplan(){
        $mealplan_id = $this->input->post("mealplan_id");
        $this->db->where("mealPlan_id", $mealplan_id);
        $this->db->delete('dailymealplan');
        $this->db->where("mealPlan_id", $mealplan_id);
        $this->db->delete('mealplan');
        
        $toast = array('state' => true, 'msg' => 'Mealplan is deleted successfully.');
        $this->session->set_flashdata('toast', $toast);
    }
}
