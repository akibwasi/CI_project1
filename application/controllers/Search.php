<?php
class Search extends CI_Controller{	
	public function index(){
		$this->session->unset_userdata('cid');
		$this->session->unset_userdata('tid');
		$search= $_POST['search'];
		$result2['topic']=$this->member_login_model->topic_search($search);
		$result2['cid']=NULL;  // because view_cat sends cid
		if($result2!=NULL){
			$this -> load -> view('head');
			$this -> load -> view('view_category',$result2);	
			$this -> load -> view('footer');
		}
	}
}
?>