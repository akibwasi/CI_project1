

$(document).ready(function(){                                    //jquery starts......
  $("#tf").submit(function(event){
	  event.preventDefault();

	$.ajax({                                                     //ajax starts.........
		url: "Search",
		type:'POST',
		data: {
		search: $("#s").val(),
		},
		success:function(data)
		{
		//$("body").html(data);	// print in a different window
		//$("#search").val(data); //print inside the textbox
        if(data=='No Topic found')
			$(".tfclear").css({color:'blue'}).html(data);
		else
			$('body').html(data);			
		}
     });
 });
});