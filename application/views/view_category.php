<body>
  <h1 align="center">
Topics
  </h1>

<div id="wrapper">
<div align="left">

<script type="text/javascript" src="<?php echo base_url();?>js/login.js"> </script>

<?php
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
	$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a><br/><br/>";		
	 $logged="<a class='cat_links1' href='member_login'>Return to Forum Index</a>";
	  if($cid){
		  echo"<a class='cat_links1' href='create_top?cid=".$cid."'>Click here to create a new topic</a> | ".$logged."<hr/>";
	  }else{
		  echo"<a class='cat_links1' href='javascript:location.reload(true)'>Back to the previous page</a>  |  <a class='cat_links1' href='member_login'>Return to Forum Index</a>";
	  }
	 $topics="<table width='100%' style'border-collapse: collapse;'>";
	 $topics .="<tr style='background-color:#dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views</td></tr>";
 	 $topics .="<tr><td colspan='3'><hr /></td><tr>";

    if($topic!=NULL){   
    foreach ($topic as $top){	
		$res1 = $this->view_cat_model->u_name($top->topic_creator);
		$topics .="<tr><td><a href='View_top?cid=".$top->category_id."&tid=".$top->id."'class='cat_links2'<b>".$top->topic_title."</b><br/></a><span class='post_info'>Posted by: ".$res1->username." on ".$top->topic_date."</span></td><td align='center'>".$top->topic_reply."</td><td align='center'>".$top->topic_views."</td></tr>";
 		$topics .="<tr><td colspan='3'><hr /></td></tr>";
		}		   
		$topics .="</table>";
		echo $topics;
 	}else{
   		//echo "| <a href='member_login'>Return to Forum Index</a><hr />";
		echo "<hr><p> there are no topics in this category</p>";
	}	 		
}else{  
echo "<form action='' id='su' method='post' onsubmit='return check();'>
	<br />
	username: <input class='tt' type='text' name='username' id='p'/>&nbsp;<br /> <br /> 
	password: <input class='ttt' type='password' name='password' id='q'/>&nbsp;<div class='d1'> </div> <br /> <br /> 
	<input type='submit' name='submit' value='Log In'/>
	</form>
	</br><div class='d5'> If you don't have an account already please <a class='cat_links1' href='Register'>Register </a></div> 
	";
	$logged="|Please log in to create a new thread";
	}
?>
   </div>
</div>
</body>
