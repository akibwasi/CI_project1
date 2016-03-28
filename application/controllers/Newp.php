<?php
class Newp extends CI_Controller{	
	
	public function index(){
		$this->session->unset_userdata('cid');
		$this->session->unset_userdata('tid');
		$result3['topic']=$this->member_login_model->new_posts();
		$result3['cid']=NULL;  // because view_cat sends cid
		if($result3!=NULL){
			$this -> load -> view('head');
			$this -> load -> view('view_category',$result3);	
			$this -> load -> view('footer');
		}
	}
}
?>