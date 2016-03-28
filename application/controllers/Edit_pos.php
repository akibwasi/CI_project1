<?php
class Edit_pos extends CI_Controller{

	public function index(){
		$result['pid']=$_GET['pid'];
		$result['cid']=$_GET['cid'];
		$result['tid']=$_GET['tid'];
		$result['post_content']=$_GET['post_content'];
		$this -> load -> view('head');
		$this -> load -> view('edit_post',$result);
		$this -> load -> view('footer');
	}
	
		public function update_post(){
		if(($_POST['post_content'])==NULL){
        	echo"null";			
		}else{
			$cid = $_POST['cid'];
			$tid = $_POST['tid'];
			$pid = $_POST['pid'];
			$post_content = $_POST['post_content'];
			$this-> edit_pos_model-> update_post($pid,$post_content);			
			$this->session->set_userdata('tid', $tid);
			$this->session->set_userdata('cid', $cid);
			redirect('View_top');
			//exit();
		}
	}
}