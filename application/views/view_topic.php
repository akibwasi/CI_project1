<body> 
   <?php	
   $res = $this->view_topic_model->t_name($tid);
   ?>
   <h1 align="center"> <?php echo"Topic: $res->topic_title";?> </h1>

<div id="wrapper">
<div align="left">

<script type="text/javascript" src="<?php echo base_url();?>js/login.js"> </script>

<?php
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
	$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a>";	
	echo"<br><br><a class='cat_links1' href='view_cat?cid=".$cid."'\">Back to the previous page</a><tr>&nbsp;|&nbsp;</tr><a class='cat_links1' href='member_login'\">Return to the forum index</a><hr>";
	
	echo "<table width='100%'>";                // table starts
    if($post!=NULL){
		foreach ($post as $pos){
			$res1 = $this->view_topic_model->u_name($pos->post_creator); 
			//$profile=substr($res1->profile,10,-4); // subtracting 'C:fakepath' and '.jpg' from image url 			
			if($res1->username==$username){
				echo "<tr><td class='p_body' vlign='top' style='border: 1px solid #000000;'>";?> <img src=' <?php echo base_url();?>img/<?php echo"".$res1->profile.""; ?>'  width='65' height='60'/> <?php echo "posted by <b>".$res1->username."</b> on ".$pos->post_date."<hr /><div class='cont' style='max-width:800px; word-wrap:break-word;'>".$pos->post_content."<br><br></div></td></tr><div><td align='right'><a class='cat_links1' href='edit_pos?pid=".$pos->id."&post_content=".$pos->post_content."&cid=".$cid."&tid=".$tid."'>Edit</a> &nbsp;<a class='cat_links1' onclick='javascript:confirmationDelete($(this));return false;' href='View_top/delete_reply?pid=".$pos->id."'>Delete</a></td></div><tr><td colspan='2'><hr></td></tr>";  //View_top/delete_reply?pid=".$pos->id."
			}else{
				echo "<tr><td class='p_body' vlign='top' style='border: 1px solid #000000;'>";?> <img src=' <?php echo base_url();?>img/<?php echo"".$res1->profile.""; ?>' width='65' height='60'/> <?php echo " posted by <b>".$res1->username."</b> on ".$pos->post_date."<hr /><div class='cont' style='max-width:800px; word-wrap:break-word;'>".$pos->post_content."<br><br></div></td></tr><tr><td colspan='2'><br><hr></td></tr>";
			}		
		}
		echo "</table>";                          // table ends
	}else{
		echo "<p> there are no posts in this topic</p>";
		echo "</table>"; 
		}
?>

<script language="JavaScript" type="text/javascript">
function confirmationDelete(anchor){
	var r=confirm('Are you sure that you want to delete this post?');
	if(r==true){
		window.location=anchor.attr("href");
	}
}
</script>

  <div id="content">
  <form action="View_top/post_reply" id="su1" method="post" onSubmit="return check();" >
  <textarea name="reply_content" id="z" rows="5"></textarea>
  <div class="z1" style="position:absolute;"> </div> <br> <br><hr />
  <input type="hidden" name="cid" id="x" value="<?php echo $cid; ?>" />
  <input type="hidden" name="tid" id="y" value="<?php echo $tid; ?>" />
  <input type="submit"  name="reply_submit" value="Post Replay" />
  </form>
  </div>	
<!--
<script type="text/javascript">
$(document).ready(function(){                                    //jquery starts......
  $("#su1").submit(function(event){
	  event.preventDefault();

	$.ajax({                                                     //ajax starts.........
		url: "<?php echo base_url('View_top/post_reply');?>",
		type:'POST',
		data: {
		cid: $("#x").val(),
		tid: $("#y").val(),
		reply_content: $("#z").val(),
		},
		success:function(data)
		{  
		 if(data=='Please write something')
         	$('.z1').css({color:'red'}).html(data);
		 else 
		 	$('body').html(data);	
		}
     });
 });
});
</script>
-->
<script type="text/javascript">
     function check()
            {
				var cont = document.getElementById("z").value;
                if(cont=='')
                	{
                    //alert('plz fill the box');
					//$(".tt").val('plz fill the box');	
					$(".z1").css({color:'red'}).html('please write something');	
					return false;
                	}
			}
</script>
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
	$logged="|Please log in to post reply";
	}
?>
   </div>
</div>
</body>
