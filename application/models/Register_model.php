<?php
class Register_model extends CI_Model{
	
	public function insert_value($username,$password,$f_name,$l_name,$gender,$email,$filename){
		$encrypt_password=md5($password); 
		$query6=$this->db->query("INSERT INTO member(username,password,first_name,last_name,gender,email,profile) VALUES ('".$username."','".$encrypt_password."','".$f_name."','".$l_name."','".$gender."','".$email."','".$filename."')"); 
		$new_user_id =  $this->db->insert_id();
		return $new_user_id; 
	}
	
	public function valid($username){
		$query1=$this->db->query("SELECT * FROM member WHERE username='".$username."' "); 
	    foreach ($query1->result() as $res)
        {
        return $res;
        }
	}	
}
?>