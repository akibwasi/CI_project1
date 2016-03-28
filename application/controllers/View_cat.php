<?php
class View_cat extends CI_Controller{

	public function index(){
		$this->session->unset_userdata('cid');
		$this->session->unset_userdata('tid');
		$cid=$_GET['cid'];
		$result['topic']= $this-> view_cat_model-> topics($cid);
		$result['cid']=$cid;
		$this -> load -> view('head');
		$this -> load -> view('view_category',$result);
		$this -> load -> view('footer');
	}
	

}