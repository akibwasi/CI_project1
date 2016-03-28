<?php
class Register extends CI_Controller{
    
	public function _construct(){
		parent::_construct();
		$this->load->library('image_lib');
		$this->load->helper(array('captcha'));
	}
	
	public function index(){
		$data=array(
			'img_path'=>'./static/',
			'img_url'=>'http://localhost/CI_project/static/',
			'img_width'=> '180',
			'img_height'=>'35'					
		);
		$captcha=create_captcha($data);              //$captcha is an array where $image,$word etc are index
				
		$this -> load -> view('head');
	    $this -> load -> view('registration',$captcha);
		$this -> load -> view('footer');
	}
	
	public function insert(){
		//if(isset($_POST['Submit'])){
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filepath = "img/".$filename;
		move_uploaded_file($filetmp,$filepath);

		$username=$_POST['u_name'];
		$password=$_POST['password'];
		$password1=$_POST['password1'];
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$cap=$_POST['cap'];
		$cap_input=$_POST['cap_input'];
 		//}	
		$u_valid=$this->register_model->valid($username);

		if($u_valid){
			echo"exist";
		}
		else if(strlen($password)<5){
			echo"low";
		}
		else if(!preg_match('#[0-9]#',$password)){
			echo"number";		
		}
		else if($password!=$password1){
			echo"diff";		
		}
		else if($cap!= $cap_input){
			echo "captcha";	 
		} 
		else{
			$data1['user_id']=$this-> register_model-> insert_value($username,$password,$f_name,$l_name,$gender,$email,$filename); 
			$data1['username']=$username;
			$this->session->set_userdata($data1);
			redirect('member_login');
			//header('Location: Member_login' );				
		}		
	}
}
	
?>