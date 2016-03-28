<?php
class View_top extends CI_Controller{

	public function index(){
		if($this->session->has_userdata('cid')){        // after creating a topic
			$tid = $this->session->userdata('tid');
			$cid = $this->session->userdata('cid');	
		}else{		
			$cid=$_GET['cid'];
			$tid=$_GET['tid'];
		}		
		$this-> view_topic_model-> increment_view($cid,$tid); 
		$result['post']= $this-> view_topic_model-> topics($cid,$tid);
		$result['cid']=$cid;
		$result['tid']=$tid; 	
		$this -> load -> view('head');
		$this -> load -> view('view_topic',$result);
		$this -> load -> view('footer');
	}
	
	public function post_reply(){
		if(($_POST['reply_content'])!=NULL){
			$creator = $_SESSION['user_id'];
			$cid = $_POST['cid'];
			$tid = $_POST['tid'];
			$reply_content = $_POST['reply_content'];
			$this-> view_topic_model-> post_replay($cid,$tid,$creator,$reply_content);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			echo"Please write something";
		}
	}
	
	public function delete_reply(){
		$pid = $_GET['pid'];
		$this-> view_topic_model-> del_replay($pid);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}