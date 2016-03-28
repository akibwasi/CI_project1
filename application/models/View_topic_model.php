<?php
class View_topic_model extends CI_Model{
	
	public function topics($cid,$tid){		
		$query1=$this->db->query("SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'"); 
		return  $query1->result();
	}
	
	public function increment_view($cid,$tid){		
		$query4=$this->db->query("SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1");
		foreach ($query4->result() as $top)
		$old_view=$top->topic_views;
		$new_views=$old_view +1;
		$query5=$this->db->query("UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1"); 
	}
	
	public function u_name($creator){
		 $query2=$this->db->query("SELECT * FROM member WHERE user_id='".$creator."'"); 
	 	 foreach ($query2->result() as $res)
         {
         return $res;
         }
		//return $$query2->result();
	}
	
	public function t_name($tid){
		 $query3=$this->db->query("SELECT * FROM topics WHERE id='".$tid."'"); 
	 	 foreach ($query3->result() as $res1)
         {
         return $res1;
         }
	}
	
	public function post_replay($cid,$tid,$creator,$reply_content){
		 $query7=$this->db->query("INSERT INTO posts (category_id, topic_id, post_creator, post_content,post_date) VALUES ('".$cid."','".$tid."','".$creator."','".$reply_content."', now())"); 
		 $query8=$this->db->query("UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1");
		 $query9=$this->db->query("UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1"); 
		//increment replay count 
		$query6=$this->db->query("SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1");
		foreach ($query6->result() as $top)
		$old_reply=$top->topic_reply;
		$new_reply=$old_reply +1;
		$query10=$this->db->query("UPDATE topics SET topic_reply='".$new_reply."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1"); 
	}
	
	public function del_replay($pid){
		$query15=$this->db->query("DELETE FROM posts WHERE id='".$pid."' LIMIT 1");
	}
}
?>