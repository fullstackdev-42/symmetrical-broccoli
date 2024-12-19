<?php 
	class Meal_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function get_meal($meal_id){
            $this->db->select('*');
            $this->db->from('meal');            
            $this->db->where('meal.meal_id',$meal_id);
            $query = $this->db->get();

            return $query->result();
        }

        public function get_all_meals(){
            $this->db->select('*');
            $this->db->from('meal');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function update($condition, $data){
            $this->db->where($condition);
            $this->db->update('meal', $data);
            return;
        }

        public function add($data){
            $this->db->insert('meal', $data);
            return $this->db->insert_id();;
        }

        public function add_meal_ingredient($ingredients, $meal_id){
            foreach ($ingredients as $key => $value) {
                $ingre= array(
                    "meal_meal_id" => $meal_id,
                    "ingredient_ingredient_id" => $key,
                    "quantity" => $value
                );
                $this->db->insert('meal_has_ingredient', $ingre);
            }
        }

        public function delete($condition){
            $this->db->delete('meal', $condition);
            return;
        }

        public function delete_diet($meal_id){
            $condition = array(
                "Meal_meal_id" => $meal_id
            );
            $this->db->delete('meal_has_diettype', $condition);
            return;
        }

        public function delete_ingredient($meal_id){
            $condition = array(
                "meal_meal_id" => $meal_id
            );
            $this->db->delete('meal_has_ingredient', $condition);
            return;
        }
	}
?>