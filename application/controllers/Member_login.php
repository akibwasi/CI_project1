<?php
class Member_login extends CI_Controller{

	public function index(){
		$result1['category']=$this->member_login_model->category();
		$this -> load -> view('head');
	    $this -> load -> view('forum',$result1);
		$this -> load -> view('footer');
	}
			
	public function login(){
		if(isset($_POST['username'])){
	    $username= $_POST['username'];
	    $password= $_POST['password'];
		}
		$result=$this->member_login_model->login_check($username,$password);
			
		if($result){	 
		//$uid=$result->user_id;
		$data1['username']=$result->username;
		$data1['user_id']=$result->user_id;			
		
		$this->session->set_userdata($data1);
		//$this -> load -> view('forum',$data1);
        //redirect(member_login);
		header('Location: ' . $_SERVER['HTTP_REFERER']);	    					
		exit();
	 }else{
		 echo"invalid login information.return to the previous page";
	 }
		
	}
	public function logout(){
     	$this->session->unset_userdata('username');	
	 	//redirect(member_login);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
}
?>