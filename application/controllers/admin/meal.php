<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		$data['admin_tab'] = 'MEALS';
		//get all meals, ingredients, categories, diet types and send them to the view - these variables are used in view/admin/meal when adding or editing
		$this->load->model("admin/Meal_model", "meal", true);
		$content['meals'] = $this->meal->get_all_meals();

		$this->load->model("admin/Ingredient_model", "ingredient", true);
		$content['ingredients'] = $this->ingredient->get_all_ingredients();

		$this->load->model("admin/Category_model", "category", true);
		$content['categories'] = $this->category->get_categories();

		$this->load->model("admin/Diet_model", "diet", true);
		$content['diet_types'] = $this->diet->get_diet_types();

		$this->load->view('admin/admin_header', $data);
		$this->load->view('admin/meal', $content);
	}

	public function get_meal(){
		//get only one meal based on its id
		$meal_id=$this->input->post('meal_id');

		$this->load->model("admin/Meal_model", "meal", true);

		$res=$this->meal->get_meal($meal_id);
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));

	}

	public function get_diet_types(){
		//this function is called when you click edit pencil icon in the table to get diet types of the meal which you are going to edit
		$meal_id=$this->input->post('meal_id');
		//here you must use left join query to get diet types of the meal
		$this->db->select('*');
        $this->db->from('meal_has_diettype as m');
        $this->db->join('diettype as d', 'd.diet_id=m.DietType_diet_id', 'left');          
        $this->db->where('Meal_meal_id', $meal_id);
        $query = $this->db->get();

        $res = $query->result();		
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));

	}

	public function get_ingredients(){
		//this function is called when you click edit pencil icon in the table to get ingredients of the meal which you are going to edit
		$meal_id=$this->input->post('meal_id');
		//here you must use left join query to get ingredients of the meal
		$this->db->select('*');
        $this->db->from('meal_has_ingredient as m');
        $this->db->join('ingredient as i', 'i.ingredient_id=m.ingredient_ingredient_id', 'left');          
        $this->db->where('meal_meal_id', $meal_id);
        $query = $this->db->get();

        $res = $query->result();		
		
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));

	}

	public function add()
	{
		if($this->session->userdata('type') == "user")
    		redirect('/home');
    	//get data from front-end
    	$name = $this->input->post("name");
		$category_id = $this->input->post("category_id");
		$ingredients=$this->input->post("ingredients");
		$method = $this->input->post("method");
		$file_name = $this->input->post("file_name");
		$totalP = $this->input->post("totalP");
		$totalC = $this->input->post("totalC");
		$totalF = $this->input->post("totalF");
		$totalCal = $this->input->post("totalCal");
		$diet_types = $this->input->post("diet_types");

		$data = array(
			"name" => $name,
			"category_id" => $category_id,
			"totalP" => $totalP,
			"totalC" => $totalC,
			"totalF" => $totalF,
			"totalCal" => $totalCal,
			"method" => $method,
			"image" => $file_name
		);
		//load admin/meal_model and call add function
		$this->load->model("admin/Meal_model", "meal", true);
		$meal_id = $this->meal->add($data);
		//add ingredients of the meal in DB
		$this->meal->add_meal_ingredient($ingredients, $meal_id);
		//add diet types of the meal in DB
		$length = strlen($diet_types);
		if($length!=0){
			for($i=0; $i<($length+1)/2; $i++){
	            $diet_id = substr($diet_types, $i*2, 1);
	            $data = array(
	                'Meal_meal_id' => $meal_id,
	                'DietType_diet_id' => $diet_id
	            );
	            $this->db->insert('meal_has_diettype', $data);
	        }
		}
        
		$res   = array('state' => true, 'msg' => $name.' is added successfully.');
		$toast = array('state' => true, 'msg' => $name.' is added successfully!');
		$this->session->set_flashdata('toast', $toast);

		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));				
	}

	public function update()
	{
		if($this->session->userdata('type') == "user")
    		redirect('/home');

    	$name = $this->input->post("name");
		$category_id = $this->input->post("category_id");
		$ingredients=$this->input->post("ingredients");
		$method = $this->input->post("method");
		$totalP = $this->input->post("totalP");
		$totalC = $this->input->post("totalC");
		$totalF = $this->input->post("totalF");
		$totalCal = $this->input->post("totalCal");
		$diet_types = $this->input->post("diet_types");
		$meal_id = $this->input->post("meal_id");
		$upload_flag = $this->input->post('upload_flag');

		if($upload_flag=="1"){
			$file_name = $this->input->post("file_name");
			$data = array(
				"name" => $name,
				"category_id" => $category_id,
				"totalP" => $totalP,
				"totalC" => $totalC,
				"totalF" => $totalF,
				"totalCal" => $totalCal,
				"method" => $method,
				"image" => $file_name
			);
		} else {
			$data = array(
				"name" => $name,
				"category_id" => $category_id,
				"totalP" => $totalP,
				"totalC" => $totalC,
				"totalF" => $totalF,
				"totalCal" => $totalCal,
				"method" => $method
			);		
		}

		$condition = array(
			"meal_id" => $meal_id
		);

		$this->load->model("admin/Meal_model", "meal", true);

		$this->meal->delete_diet($meal_id);
		$this->meal->delete_ingredient($meal_id);

		$this->meal->update($condition, $data);
		
		$this->meal->add_meal_ingredient($ingredients, $meal_id);

		$length = strlen($diet_types);
		if($length!=0){
			for($i=0; $i<($length+1)/2; $i++){
	            $diet_id = substr($diet_types, $i*2, 1);
	            $data = array(
	                'Meal_meal_id' => $meal_id,
	                'DietType_diet_id' => $diet_id
	            );
	            $this->db->insert('meal_has_diettype', $data);
	        }
		}       

		$res   = array('state' => true, 'msg' => $name.' is updated successfully.');
		$toast = array('state' => true, 'msg' => $name.' is updated successfully!');
		$this->session->set_flashdata('toast', $toast);

		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));				
	}

	public function delete(){

		$meal_id = $this->input->post("meal_id");
		$meal_name = $this->input->post("meal_name");

		$condition = array(
			"meal_id" => $meal_id
		);

		$this->load->model("/admin/Meal_model", "meal", true);

		$this->meal->delete($condition);

		$toast = array('state' => true, 'msg' => $meal_name.' is Deleted Successfully!');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}
}
