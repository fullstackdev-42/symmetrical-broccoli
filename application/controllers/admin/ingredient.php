<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredient extends Base_Controller {

	public function __construct()
    {
    	parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('type') == "user")
    		redirect('/user/account');
    	//load ingredient_model to get all ingredients registered in DB and send them to the view
		$this->load->model("admin/Ingredient_model", "ingredient", true);
		$content['ingredients'] = $this->ingredient->get_all_ingredients();// there would be number of ingredients, thus this variable will be regarded as an array

		$data['admin_tab'] = 'INGREDIENTS'; // this 'admin_tab' variable is used in admin_header
		$this->load->view('admin/admin_header', $data); //load admin_header view with $data
		$this->load->view('admin/ingredient', $content); //load admin/ingredient with $content
	}

	public function get_ingredient(){
		//get only one ingredient based on ingredient_id
		$ingredient_id=$this->input->post('ingredient_id');//get posted ingredient_id

		$condition = array(
			"ingredient_id" => $ingredient_id
		);//make $condition as an array

		$this->load->model("admin/Ingredient_model", "ingredient", true);//load admin/Ingredient_model as an "ingredient"
		$res=$this->ingredient->get_ingredient($condition);//call get_ingredient function with $condition and set returned data into $res
		return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));//return $res as an array - you can simplify this like "echo $res;"
	}
	
	public function add()
	{	// Form validation when adding new meal - codeigniter provides form validation library
		if($this->session->userdata('type') == "user")
    		redirect('/home'); //this makes normal users not to access this function

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');//this will make validation_error like "Name Field is required." automatically if name field is empty
		$this->form_validation->set_rules('protein', 'Protein', 'required');//this will make validation_error like "Protein Field is required." automatically if protein field is empty
		$this->form_validation->set_rules('carbs', 'Carbohydrate', 'required');//this will make validation_error like "Carbohydrate Field is required." automatically if carbs field is empty
        $this->form_validation->set_rules('fat', 'Fat', 'required');//...
        $this->form_validation->set_rules('cal', 'Calories', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');

        if ($this->form_validation->run() == FALSE) {
           	$res = array('state' => false, 'msg' => validation_errors());
        } else {
        	//if no validation errors occur, insert this ingredient in DB
        	$name = $this->input->post("name"); //how to get a name in posted data
			$protein = $this->input->post("protein");//how to get a protein in posted data
			$carbs = $this->input->post("carbs");//...
			$fat = $this->input->post("fat");
			$cal = $this->input->post("cal");
			$quantity = $this->input->post("quantity");
			$unit = $this->input->post("unit");

			$data = array(
				"name" => $name, // name => value - "name" must match one of the column names in the table in which you are going to add this data
				"protein" => $protein, // name => value - "protein" must match one of the column names in the table in which you are going to add this data
				"carbs" => $carbs,//...
				"fat" => $fat,
				"cal" => $cal,
				"qty" => $quantity,
				"unit" => $unit
			);//make data to be inserted as an array
			//Load admin/Ingredient_model as "ingredient" - you can this model as "ingredient" as bellows
			$this->load->model("admin/Ingredient_model", "ingredient", true);

			$this->ingredient->add($data); //call function add in Ingredient model - See add function in Ingredient_model - you can see how this lets you create a simple sql query

			$res   = array('state' => true, 'msg' => $name.' is added successfully.');
			$toast = array('state' => true, 'msg' => $name.' is added successfully!');
			$this->session->set_flashdata('toast', $toast);//this makes $toast will be displayed in the right top as a error or success msg

        }
      
        return $this->output
					->set_content_type('application/json')
					->set_output(json_encode($res));//with $res, display error msgs on the right top or redirect the page in assets/scripts/admin/ingredient.js
	}

	public function delete(){
		//delete ingredient based on ingredient_id
		$ingredient_id = $this->input->post("ingredient_id");
		$ingredient_name = $this->input->post("ingredient_name");

		$condition = array(
			"ingredient_id" => $ingredient_id
		);

		$this->load->model("/admin/Ingredient_model", "ingredient", true);
		//call delete function in ingredient_model
		$this->ingredient->delete($condition);

		$toast = array('state' => true, 'msg' => $ingredient_name.' is Deleted Successfully!');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}

	public function update(){
		//get data from front-end and update ingredient info based on ingredient id
		$name = $this->input->post('name');
		$protein = $this->input->post("protein");
		$carbs = $this->input->post("carbs");
		$fat = $this->input->post("fat");
		$cal = $this->input->post("cal");
		$quantity = $this->input->post("quantity");
		$unit = $this->input->post("unit");
		$ingredient_id = $this->input->post("ingredient_id");

		$data = array(
			"name" => $name,
			"protein" => $protein,
			"carbs" => $carbs,
			"fat" => $fat,
			"cal" => $cal,
			"qty" => $quantity,
			"unit" => $unit
		);//data to be updated
		$condition = array(
			"ingredient_id" => $ingredient_id
		);//condtion that shows which row should be updated

		$this->load->model("/admin/Ingredient_model", "ingredient", true);
		//call update function in ingredient_model with $condition & $data variables
		$this->ingredient->update($condition, $data);//you need condition in order to update so you have to send 2 data - $condition & $data

		$toast = array('state' => true, 'msg' => $name.' is Updated Successfully!');
		$this->session->set_flashdata('toast', $toast);

		echo "success";
	}
}
