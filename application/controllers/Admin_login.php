<?php
class Admin_login extends CI_Controller{

	public function index(){
		$result1['category']=$this->admin_login_model->category();
		$this -> load -> view('head');
	    $this -> load -> view('forum',$result1);
		$this -> load -> view('footer');
	}
			
	public function login(){
		if(isset($_POST['username'])){
	    $username= $_POST['username'];
	    $password= $_POST['password'];
		}
		$result=$this->admin_login_model->login_check($username,$password);
			
		if($result){	 
		//$uid=$result->user_id;
		$data1['username']=$result->username;
		$data1['user_id']=$result->user_id;			
		
		$this->session->set_userdata($data1);
		//$this -> load -> view('forum',$data1);
        //redirect(admin_login);
		header('Location: ' . $_SERVER['HTTP_REFERER']);	    					
		exit();
	 }else{
		 echo"invalid login information.return to the previous page";
	 }
		
	}
	public function logout(){
     	$this->session->unset_userdata('username');	
	 	//redirect(admin_login);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
public function search(){
		$search= $_POST['search'];
		$result2['topic']=$this->member_login_model->topic_search($search);
		$result2['cid']=NULL;  // because view_cat sends cid
		if($result2!=NULL){
			$this -> load -> view('head');
			$this -> load -> view('search_result',$result2);
			$this -> load -> view('footer');	
		}else{
			echo"No Topic found";
		}
	}

}
?>