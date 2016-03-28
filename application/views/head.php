<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
	<title>তরঙ্গ</title>
	<link rel="icon" type="icon" href="<?php echo base_url();?>icon/favicon.ico"></link>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/style.css"></link>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/forum.css"></link>
	<script type="text/javascript" src="<?php echo base_url();?>js/search.js"> </script>
	<script type="text/javascript" src="<?php echo base_url();?>js/login.js"> </script>
<!-- 
<ul id="menu">	
	<form class="menubttn", action="web.php">
		<input type="image" src="<?php echo base_url();?>img/h1.png" alt="home", style="width:50px;height:50px"><span class="sp">Home</span>
  </form>
	<form class="menubttn", action="web.php">
		<input type="image" src="<?php echo base_url();?>img/purchase.png" alt="home"  style="width:50px;height:50px"><span class="sp">Purchase</span>
	</form>
	<form class="menubttn", action="song.php">
		<input type="image" src="<?php echo base_url();?>img/hdphn.png" alt="home"  style="width:50px;height:50px"><span class="sp">listen Song</span>
	</form>
	<form class="menubttn", action="topChart.php">
		<input type="image" src="<?php echo base_url();?>img/tc3.png" alt="home"  style="width:50px;height:50px"><span class="sp">topchart</span>
	</form>
	<form class="menubttn", action="forum.php">
		<input type="image" src="<?php echo base_url();?>img/pfl.png" alt="home"  style="width:50px;height:50px"><span class="sp">Forum</span>
	</form>
	<form class="menubttn", action="javascript:search('show');">
	  <input type="image" src="<?php echo base_url();?>img/search2.png" alt="home"  style="width:50px;height:50px"><span class="sp">Search Song</span>
	</form>	
</ul>
-->
<div id="big_wrapper">
	
<div id="titleBar">
	                                                      <!-- HTML for SEARCH BAR -->
  <div id="sbar" align="left" >
		<form id='tf' method="post" >
		        <input type="text" name="search" id="s" size="21" maxlength="120">
                <input type="submit" value="Find" id="but" class="tfbutton"> 
		</form> 
        <div class="tm">
        <ul class="u">
          <li><a href="Member_login">Home</a></li>
          <li><a href="Newp">New Posts</a></li>
          <li><a href="#">About Us</a>
           	<ul>
         		<li><a href="About">Location</a></li> <br />
         		<li><a href="javascript:search('show');">Contact Info</a></li>
           	</ul>
          </li>
         </ul>
         </div>
        <div class="tfclear" align="left"> </div>
        		 <div class="con">
               		<img src="<?php echo base_url();?>img/1.jpg" class="img" />
                    <img src="<?php echo base_url();?>img/2.jpg" class="img" />
                    <img src="<?php echo base_url();?>img/3.jpg" class="img" />	
					<img src="<?php echo base_url();?>img/4.jpg" class="img" />	
                 </div>
  </div>
</div>			

<script language="JavaScript" type="text/javascript">
function search(showhide){
if(showhide == "show"){
    document.getElementById('popupbox').style.visibility="visible";
}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden"; 
}
}
</script>

<div id="popupbox"> 
 <h1 style="color:#FFF;">Contact informations</h1>

<center id="close"><a href="javascript:search('hide');" class="close">Close [X]</a></center>
</div> 

</head>
</html>