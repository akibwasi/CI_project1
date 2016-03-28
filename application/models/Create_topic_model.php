<?php
class Create_topic_model extends CI_Model{
	
	public function post_topic($cid,$creator,$content,$title){
		$query1=$this->db->query("INSERT INTO topics(category_id,topic_title,topic_creator,topic_date,topic_reply_date) VALUES ('".$cid."','".$title."','".$creator."',now(), now())"); 
		$new_topic_id =  $this->db->insert_id();
		
		$query2=$this->db->query("INSERT INTO posts(category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."','".$new_topic_id."','".$creator."','".$content."',now())"); 
		
		$query3=$this->db->query("UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1"); 
		return $new_topic_id;
	}

}
?>