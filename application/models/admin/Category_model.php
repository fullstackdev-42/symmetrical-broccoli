<?php 
	class Category_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function get_categories(){
            $this->db->select('*');
            $this->db->from('category');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function update($condition, $data){
            $this->db->where($condition);
            $this->db->update('category', $data);
            return;
        }

        public function add($data){
            $this->db->insert('category', $data);
            return;
        }
        public function delete($condition){
            $this->db->delete('category', $condition);
            return;
        }
	}
?>