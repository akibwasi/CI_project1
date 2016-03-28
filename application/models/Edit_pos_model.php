<?php
class edit_pos_model extends CI_Model{
	
	public function update_post($pid,$post_content){
		
		$query2=$this->db->query("UPDATE posts SET post_content='".$post_content."' WHERE id='".$pid."' LIMIT 1"); 
		
	}

}