<?php
class View_cat_model extends CI_Model{
	
	public function topics($cid){		
		$query1=$this->db->query("SELECT * FROM topics WHERE category_id='".$cid. "'ORDER BY topic_reply_date DESC"); 
		return  $query1->result();
	}
	
	public function u_name($creator){
		 $query2=$this->db->query("SELECT username FROM member WHERE user_id='".$creator."'"); 
	 	 foreach ($query2->result() as $res)
         {
         return $res;
         }
		//return $$query2->result();
	}

}
?>