<body>
<h1> Forum Indexx </h1>
<!--
<div id="popupbox"> 
 <h1>Search song</h1>
<br>
<form name="login"  method="post">
<center>Song Title</center>
<center><input name="username" size="30" /></center>
<br>
<center>Artist</center>
<center><input name="password" type="password" size="30" /></center>
<br>
<center><input type="image" src="<?php echo base_url();?>image/search2.png" value="Search" style="width:60px;height:60px"/></center>
</form>
<br />
<br />
<center id="close"><a href="javascript:search('hide');">close</a></center> 
</div> 
-->
<div id="wrapper">
 <div align="left"> 
<!--
 <script type="text/javascript">
     function check()
            {
                var uname = document.getElementById("p").value;
				var pass = document.getElementById("q").value;
                if(uname=='' || pass=='')
                {
                    //alert('plz fill the box');
					//$(".tt").val('plz fill the box');	
					$(".d1").css({color:'red'}).html('plz fill both boxes');	
					return false;
                }
			}
</script>
-->
<?php
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
	$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a>";	
	
}else {
	echo "<form action='' id='su' method='post' onsubmit='return check();'>
	<br />
	username: <input class='tt' type='text' name='username' id='p'/>&nbsp;<br /> <br /> 
	password: <input class='ttt' type='password' name='password' id='q'/>&nbsp;<div class='d1'> </div> <br /> <br /> 
	<input type='submit' name='submit' value='Log In'/>
	</form>
	</br><div class='d5'> If you don't have an account already please <a class='cat_links1' href='Register'>Register </a></div> 
	";
	}
?>
   
 </div>
 <hr />
<div id='content' align='left'>
<?php

 if($this->session->has_userdata('username')){
 foreach ($category as $cat)
 {

		 echo"<a href='View_cat?cid=".$cat->id."' class='cat_links'><font size='4'>".$cat->category_title." - <font size='3'>".$cat->category_description."</font></a><hr />";
	 } 
 }

 ?>
   </div>
</div>
</body>


