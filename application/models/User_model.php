<?php 
	class User_model extends CI_Model {

		public function __construct()
		{
		    parent::__construct();
            $this->load->library('session');
		}

		public function login($username, $password){

            $this->db->where('username', $username);
            $query = $this->db->get('users');

            if($query->num_rows() > 0)
            {
                $row = $query->row();
                if($row->password == md5($password))
                {
                    $this->session->set_userdata("username", $row->username);
                    $this->session->set_userdata("user_id", $row->user_id);
                    $this->session->set_userdata("user_type", $row->user_type);
                    $this->session->set_userdata("logged_in", true);

                    return $row->user_type; // echo "success";
                }
                else
                {
                    return -1;
                    //echo "password wrong";
                }
            }
            else
            {
                return -2;
                //echo "No user!!!";
            }			
		}

        public function get_user($condition){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->result();
        }

        public function update_check($user_id, $username){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username', $username);
            $this->db->where('user_id !=', $user_id);
            $query = $this->db->get();
            $row = $query->num_rows();
            if($row==0){
                return false;
            }else{
                return true;
            }
        }

        public function register($data){
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }

        public function delete($condition){
            $this->db->delete("users", $condition);
        }
        
        public function update($data, $user_id)
        {
            $this->db->where("user_id", $user_id);
            $this->db->update('users', $data);
        }
	}
?>