<?php
class Create_top extends CI_Controller{

	public function index(){
		$cid['cid']=$_GET['cid'];
		$this -> load -> view('head');
		$this -> load -> view('create_topic',$cid);
		$this -> load -> view('footer');
	}
	
	public function post_topic(){
			$creator = $_SESSION['user_id'];
			$cid = $_POST['cid'];
			$topic_content = $_POST['topic_content'];
			$topic_title = $_POST['topic_title'];
			$result1['tid']= $this-> create_topic_model-> post_topic($cid,$creator,$topic_content,$topic_title);
			$tid = $result1['tid'];

			$this->session->set_userdata('tid', $tid);
			$this->session->set_userdata('cid', $cid);
			redirect('View_top');
	}
}