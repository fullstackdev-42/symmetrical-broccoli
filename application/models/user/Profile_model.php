<?php 
	class Profile_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
		}

        public function update($condition, $data){
            $this->db->where($condition);
            $this->db->update('', $data);
            return;
        }

        public function get_profile($user_id){
            $this->db->where('user_id', $user_id);
            $this->db->from('profile');
            $query = $this->db->get();
            if($query->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }

        public function get_profile_details($user_id){

            $this->db->where('user_id', $user_id);
            $this->db->from('profile');
            $this->db->join('profile_has_diettype', 'profile_has_diettype.Profile_profile_id = profile.profile_id', 'left');
            $query = $this->db->get();
            return $query->result();
        }

        public function add($data){
            $this->db->insert('profile', $data);
            return  $this->db->insert_id();
        }
        public function delete($user_id){
            $this->db->where("user_id", $user_id);
            $this->db->delete('profile');
            return;
        }
	}
?>