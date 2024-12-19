<?php 
	class Ingredient_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function get_ingredient($condition){
            //$condition is a condition sent from get_ingredient function in admin/ingredient controller
            //$condition is ("ingredient_id" : $ingredient_id)
            $this->db->select('*');
            $this->db->from('ingredient');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();//these 5 rows codes is just a query : "Select * from 'ingredient' where 'ingredient_id' = $ingredient_id" in pure sql
            //these kinds of simple queries are also provided by codeigniter model itself
        }

        public function get_all_ingredients(){
            $this->db->select('*');
            $this->db->from('ingredient');
            $query = $this->db->get();
            return $query->result();//you can find there's no condition - so is "Select * from 'ingredient'" in pure sql
        }
        
        public function update($condition, $data){
            //$condition is ("ingredient_id" : $ingredient_id), $data is {"name": $name , "protein": $protein ...} - see update function in ingredient controller
            $this->db->where($condition);
            $this->db->update('ingredient', $data);
            return;//"UPDATE ingredient SET name=$name, protein=$protein... WHERE ingredient_id=$ingredient_id" - how simple it is!
        }

        public function add($data){
            $this->db->insert('ingredient', $data);
            return;//you can find the pure insert sql easily by yourself
        }
        public function delete($condition){
            $this->db->delete('ingredient', $condition);
            return;//you can find the pure delete sql easily by yourself
        }
	}
?>