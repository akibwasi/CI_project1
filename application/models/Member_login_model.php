<?php
class Member_login_model extends CI_Model{
	
	public function login_check($username,$password){	
	$encrypt_password=md5($password);	
		$query = $this->db->query("SELECT * FROM member WHERE username='".$username."' AND password='".$encrypt_password."' LIMIT 1");
		$query5 = $this->db->query("UPDATE member SET online='1' WHERE  username='".$username."' LIMIT 1");
        foreach ($query->result() as $res)
        {
        return $res;
        }
  	}
	
	public function category(){
	 	$query1=$this->db->query("SELECT * FROM categories ORDER BY category_title ASC"); 
	 	return  $query1->result();
	}
	
	public function u_name($username){
	 	$query4=$this->db->query("SELECT * FROM member WHERE username='".$username."' LIMIT 1"); 
   		foreach ($query4->result() as $res4)
        {
        return $res4;
        }        
	}
	
	public function topic_search($search){
	 	$query2=$this->db->query("SELECT * FROM topics WHERE topic_title like '%".$search."%' "); 
   		return $query2->result();        
	}	
	
	public function new_posts(){
	 	$query3=$this->db->query("SELECT * FROM topics ORDER BY topic_reply_date DESC LIMIT 10"); 
   		return $query3->result();        
	}	
}
?>