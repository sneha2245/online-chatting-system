$(document).ready(function(){
	
	var seenPas = document.getElementById("pas");
	var conPas = document.getElementById("conPas");
	var logPassword = document.getElementById("logPassword");
	var reset_password=document.getElementById("reset_password");
	var reset_con_password=document.getElementById("reset_con_password");
	
	$("#seenPas").on("click", function(){
		if(seenPas=="password"){
			seenPas = document.getElementById("pas").type="text";
			document.getElementById("seen1").src="images/visible.png";			
		}else{
			seenPas = document.getElementById("pas").type="password";
			document.getElementById("seen1").src="images/hide.png";	
		}
	});		
	$("#seenConPas").on("click", function(){				
		if(conPas=="password"){				
			conPas = document.getElementById("conPas").type="text";
			document.getElementById("seen2").src="images/visible.png";
		}else{
			conPas = document.getElementById("conPas").type="password";
			document.getElementById("seen2").src="images/hide.png";		
		}			
	});
	$("#SeenLogPassword").on("click", function(){	
		if(logPassword=="password"){
			logPassword = document.getElementById("logPassword").type="text";
			document.getElementById("seen3").src="images/visible.png";
		}else{
			logPassword = document.getElementById("logPassword").type="password";
			document.getElementById("seen3").src="images/hide.png";	
		}
	});	
	$("#SeenReset_password").on("click", function(){			
		if(reset_password=="password"){				
			reset_password = document.getElementById("reset_password").type="text";
			document.getElementById("seen4").src="images/visible.png";
		}else{				
			reset_password = document.getElementById("reset_password").type="password";	
			document.getElementById("seen4").src="images/hide.png";					
		}		
	});
	$("#SeenReset_con_password").on("click", function(){
		if(reset_con_password=="password"){
			reset_con_password = document.getElementById("reset_con_password").type="text";
			document.getElementById("seen5").src="images/visible.png";
		}else{
			reset_con_password = document.getElementById("reset_con_password").type="password";
			document.getElementById("seen5").src="images/hide.png";		
		}		
	});
});
// $(window).on("load",function(){	
	// var href = document.location.href;
	// if(href.indexOf("main.php")>-1){
		// document.location.href = href.replace("main.php","main");				
	// }
	// var href1 = document.location.href;
	// if(href1.indexOf("chat.php")>-1){
		// document.location.href = href.replace("chat.php","chat");				
	// }
	// var href2 = document.location.href;
	// if(href2.indexOf("index.php")>-1){
		// document.location.href = href.replace("index.php"," ");				
	// }
	
// });
		
	
