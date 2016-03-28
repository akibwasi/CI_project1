<body>
  <h1 align="center">Create Topic </h1>

<div id="wrapper">
<div align="left">

<script type="text/javascript" src="<?php echo base_url();?>js/login.js"> </script>

<?php
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
	$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a>";	
	
	echo"<br><br><a class='cat_links1' href='view_cat?cid=".$cid."'\">Back to the previous page</a><tr>&nbsp;|&nbsp;</tr><a class='cat_links1' href='member_login'\">Return to the forum index</a>";
?>
 <hr />
  <div id="content">
  <form action="create_top/post_topic" id="su1" method="post" onSubmit="return check();">
  <p> Topic Title</p>
  <input type="text" name="topic_title" id="y" size="75" maxlength="150" /><div class="z1" style="position:absolute;"></div> 
  <p> Topic content</p>
  <textarea name="topic_content" id="z" rows="5" cols="76"></textarea><div class="z2" style="position:absolute;"> </div>
  <br /><br /><br />
  <input type="hidden" name="cid" id="x" value="<?php echo $cid; ?>"/>
  <input type="submit" name="topic_submit" value="Create Your Topic"/>
  </form>
  </div>
<!--<script type="text/javascript">
$(document).ready(function(){                                    //jquery starts......
  $("#su1").submit(function(event){
	  event.preventDefault();

	$.ajax({                                                     //ajax starts.........
		url: "<?php echo base_url('create_top/post_topic');?>",
		type:'POST',
		data: {
		cid: $("#x").val(),
		topic_title: $("#y").val(),
		topic_content: $("#z").val(),
		},
		success:function(data)
		{  
		 if(data=='title'){
         	$('.z1').css({color:'red'}).html("Please give the topic a title");
			$('.z2').empty();
		 }
		 else if(data=='content'){
		 	$('.z2').css({color:'red'}).html("Please write something");	
		 	$('.z1').empty();	
		 }
		 else if(data=='both'){
		 	$('.z1').css({color:'red'}).html("Please give the topic a title");
		 	$('.z2').css({color:'red'}).html("Please write something");	
		 }
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
                var title = document.getElementById("y").value;
				var cont = document.getElementById("z").value;
                if(title=='' && cont!='')
                	{
                    //alert('plz fill the box');
					//$(".tt").val('plz fill the box');	
					$(".z1").css({color:'red'}).html('plz enter a topic title');	
					$('.z2').empty();
					return false;
                	}
				else if(title!='' && cont=='')
					{
					$(".z2").css({color:'red'}).html('plz write something');	
					$('.z1').empty();	
					return false;
					}
				else if(title=='' && cont=='')
					{
					$(".z1").css({color:'red'}).html('plz fill both boxes');
					$(".z2").css({color:'red'}).html('plz fill both boxes');	
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
	$logged="|Please log in to create a new thread";
}
?>
   </div>
</div>
</body>