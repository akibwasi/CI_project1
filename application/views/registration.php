<body>
  <h1 align="center">Registration</h1>

<div id="wrapper">
<div align="left">

<?php  
if($this->session->has_userdata('username')){
	$username=$this->session->userdata('username');
	$user_id=$this->session->userdata('user_id');
	$pp = $this->member_login_model->u_name($username); 
	echo "<p>You are logged in as ".$username." ";?><img src="<?php echo base_url();?>/img/<?php echo"".$pp->profile.""; ?>" width="25" height="25"/> <?php echo" &bull; <a class='cat_links1' href='member_login/logout'>Logout</a>";	
?>
</div>
<?php
}else{
	echo"<br><br>If you already have an account please <a class='cat_links1' href='member_login'\">Login</a></tr>";
?>
 <hr />
  <div id="content">
  <form action="register/insert" id="su1" method="post" enctype="multipart/form-data">
  </br>
   <div class="gg">
   Username : <input type="username" required  class="i" name="u_name" id="i1" size="25" maxlength="50"/><div id="z1" class="z"></div></div>
   <br/>
   <div class="gg">
   Password : <input type="password"  required="required"  class="i" name="password" id="i2" size="25" maxlength="32"/><div id="z2"  class="z"></div></div> 
   <br/>
   <div class="gg">
    Retype Password : <input type="password"  required="required"  class="i" name="password1" id="i2" size="25" maxlength="32"/><div id="zp"  class="z"></div></div> 
   <br/>
   <div class="gg"> 
   Gender :<input type="radio" name="gender" id="r1" required value="male" />Male<input type="radio" name="gender" class="i1" value="female" id="r2" />Female
   </div>
    <br/>
   <div class="gg">
   First Nmae : <input type="username" required class="i" name="f_name" id="i3" size="25" maxlength="50"/><div id="z3"  class="z"></div></div>
   <br/>
   <div class="gg">
   Last Name: <input type="username" required class="i" name="l_name" id="i4" size="25" maxlength="50"/><div id="z4"  class="z"></div></div>
   <br/>
   <div class="gg">
   Email : <input type="email" required class="i" name="email" id="i5" size="25" maxlength="50"/><div id="z5"  class="z"></div></div>
  <br/>Profile Picture : <input type="file" class="i" name="file_img" id="file_img" /> <br /><br />	
  <br/>Captcha :<div class="cap" id="cap1"> <?php echo $image; ?></div>
  <input type="hidden" name="cap" value="<?php echo $word; ?>" />
  <br/><br/><input type="username" required class="i" name="cap_input" id="i7" size="25"/><div id="z6"  class="z"></div> 
  <br><br><input type="submit" name="Submit" id="submit" value="Register"/>
  </form>

 <?php /*
  if(isset($_POST['btn_upload']))
{
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "img/".$filename;
	move_uploaded_file($filetmp,$filepath); 
} */
 ?>
<script type="text/javascript">
$(document).ready(function(){                                    //jquery starts......
  $("#su1").submit(function(event){
	//$(document).on('change', '#file_img', function(){
	 event.preventDefault();
	 data = new FormData($('#su1')[0]); 
	$.ajax({                                                     //ajax starts.........
		url: "<?php echo base_url('register/insert');?>",
		type:'POST',
		data: data,
		/*data: {
		username: $("#i1").val(),
		password: $("#i2").val(),
		first_name: $("#i3").val(),	
		last_name: $("#i4").val(),
		email: $("#i5").val(),
		profile: $("#file_img").val(),
		},*/
		processData: false,
    	contentType: false,	
		cache: false,	
		success:function(data) 
		{  
		 if(data=='exist'){
			$("#z1").css({color:'red'}).html("The username is not available");
			$("#z2").empty();	
		 }
		 else if(data=='low'){
         	$("#z2").css({color:'red'}).html("Your password must have atleast 5 characters");
			$("#z1").empty();	
		 }  
		 else if(data=='number'){
         	$("#z2").css({color:'red'}).html("Your password must contain at least one character");
			$("#z1").empty();	
		 }
		  else if(data=='diff'){
         	$("#zp").css({color:'red'}).html("Retyped Password didn't match");
			$("#z1").empty();
			$("#z2").empty();	
		 }
		 else if(data=='captcha'){
         	$("#z6").css({color:'red'}).html("incorrect captcha");
			$("#z1").empty();
			$("#z2").empty();
			$("#zp").empty();
		 }
		 else 
		 	$('body').html(data);	
		}
     });
 });
});
</script>

<script>

</script>
 </div></div>
<?php
}
?>
</div>
</body>
