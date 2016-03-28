<body>
  <h1 align="center">
 Edit Post 
  </h1>

<div id="wrapper">
<div align="left">

<script type="text/javascript" src="<?php echo base_url();?>js/login.js"> </script>

<?php
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
		$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a>";	
	
	echo"<br><br><a class='cat_links1' href='view_top?cid=".$cid."&tid=".$tid."'\">Back to the previous page</a><tr>&nbsp;|&nbsp;</tr><a class='cat_links1' href='member_login'\">Return to the forum index</a>";
?>
 <hr />
  <div id="content">
  <form action="edit_pos/update_post" id="su1" method="post" onSubmit="return check();">
  <p> Topic content</p>
  <textarea name="post_content" id="z" rows="5" cols="76"><?php echo"$post_content"; ?></textarea><div class="z2" style="position:absolute;"> </div><br>
  <br /><br />
  <input type="hidden" name="pid" id="x" value="<?php echo $pid; ?>"/>
  <input type="hidden" name="cid" id="u" value="<?php echo $cid; ?>"/>
  <input type="hidden" name="tid" id="v" value="<?php echo $tid; ?>"/>
  <input type="submit" name="topic_submit" value="Update"/>
  </form>
  </div>
  
 <script type="text/javascript">
     function check()
            {
				var cont = document.getElementById("z").value;
                if(cont=='')
                	{
                    //alert('plz fill the box');
					//$(".tt").val('plz fill the box');	
					$(".z2").css({color:'red'}).html('please write something');	
					return false;
                	}
			}
 </script>
<!--  <script type="text/javascript">
$(document).ready(function(){                                    //jquery starts......
  $("#su1").submit(function(event){
	  event.preventDefault();

	$.ajax({                                                     //ajax starts.........
		url: "<?php echo base_url('edit_pos/update_post');?>",
		type:'POST',
		data: {
		cid: $("#u").val(),
		pid: $("#x").val(),
		tid: $("#v").val(),
		post_content: $("#z").val(),
		},
		success:function(data)
		{  
		 if(data=='null'){
         	$('.z2').css({color:'red'}).html("You must write something");
		}
		 else 
		 	$('body').html(data);	
		}
     });
 });
});
</script>
-->
<?php
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
