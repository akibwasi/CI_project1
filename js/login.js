

$(document).ready(function(){                                    //jquery starts......
  $("#su").submit(function(event){
	  event.preventDefault();

	$.ajax({                                                     //ajax starts.........
		url: "Member_login/login",
		type:'POST',
		data: {
		username: $("#p").val(),
		password: $("#q").val(),
		},
		success:function(data)
		{  
		 if(data=='invalid login information.return to the previous page')
         	$('.d1').css({color:'red'}).html(data);
		 else 
		 	$('body').html(data);	
		}
     });
 });
});