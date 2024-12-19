<?php
	class Mealplan_model extends CI_Model{

		public function __construct()
		{
			parent::__construct();
		}

		public function get_profile_id($user_id){
			$this->db->select("*");
			$this->db->from('profile');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();
			$row = $query->row();
			if(isset($row)){
				return $row->profile_id;
			}else{
				return "0";
			}
		}

		public function get_mealplan_flag($profile_id){
			$this->db->select("*");
			$this->db->from('mealplan');
			$this->db->where('profile_id', $profile_id);
			$query = $this->db->get();
			$row = $query->row();
			if(isset($row)){
				return true;
			}else{
				return false;
			}
		}

		public function get_all_mealplans($profile_id){
			$this->db->select("*");
			$this->db->from('mealplan');
			$this->db->where('profile_id', $profile_id);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_dailymealplan($condition){
			$this->db->select("*");
			$this->db->from('dailymealplan');
			$this->db->where($condition);
			$query = $this->db->get();
			$row = $query->row();
			if(isset($row)){
				return $row;
			}else{
				return "failed";
			}
		}

		public function add_mealplan($data){
			$this->db->insert('mealplan', $data);
            return $this->db->insert_id();;
		}

		public function add_dailymealplan($data){
			$this->db->insert('dailymealplan', $data);
		}

		public function update_dailymealplan($data, $condition){
            $this->db->where($condition);
            $this->db->update('dailymealplan', $data);
            return;
        }
	}
?>