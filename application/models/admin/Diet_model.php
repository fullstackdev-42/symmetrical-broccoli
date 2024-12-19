<?php 
	class Diet_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function get_diet_types(){
            $this->db->select('*');
            $this->db->from('diettype');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function update($condition, $data){
            $this->db->where($condition);
            $this->db->update('diettype', $data);
            return;
        }

        public function add($data){
            $this->db->insert('diettype', $data);
            return;
        }
        public function delete($condition){
            $this->db->delete('diettype', $condition);
            return;
        }
	}
?>