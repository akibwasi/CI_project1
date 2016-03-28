<?php
class Admin_login_model extends CI_Model{
	
	public function login_check($username,$password){	
	$encrypt_password=md5($password);	
		$query = $this->db->query("SELECT * FROM admin WHERE username='".$username."'AND password='".$encrypt_password."' LIMIT 1");

        foreach ($query->result() as $res)
        {
        return $res;
        }
  	}
	
	public function category(){
	 $query1=$this->db->query("SELECT * FROM categories ORDER BY category_title ASC"); 
	 return  $query1->result();
	}
	
	public function topic_search($search){
	 	$query2=$this->db->query("SELECT * FROM topics WHERE topic_title like '%".$search."%' "); 
   		return $query2->result();        
	}	
	
}
?>