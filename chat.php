<?php include'chatcontentprocess.php' ?>
<?php include 'searchbarchat.php'?>
<?php	
	session_start();	
	$servername="localhost";
	$username="root";
	$password="";
	$dbName="chatting-system";	
	$port="3308";
	
	$id=$_GET['id'];	
	$q1="select * from users where id =" .$id;	
	$conn = mysqli_connect($servername, $username, $password, $dbName, $port);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $q1);		
	$row = mysqli_fetch_assoc($result);	

	mysqli_close($conn);	
?>

<html lang="zxx">
<head>
	<!-- meta tag -->
	<meta charset="utf-8">
	<title>Welcome to - Chatting System</title>
	<meta name="description" content="">
	<!-- responsive tag -->
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/new_style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

</head>
<body class="instructor-home">
	<div class="rs-events sec-spacer sec-color pt-70">
		<div class="container"> 
			<div class="row">
                <div class="col-md-12 offset-md-1">
                    <div class="contact-comment-section">
                        <div class="row">
							<div class="col-md-4 col-sm-12 echoChatDiv">
								<div>
									<a href="main.php" >												
										<img id ="image" style="margin-top: 12px;width:40px" src="images/back.png" alt="Back"/>
									</a>
								</div>
								<div class="chat-div">
									<?php 
										if($row['gender']=="M"){													
											echo '<div>' . '<img style="border-radius:100%;height: 150px;width: 150px;margin: auto;"src="images/male.png" alt="Male"/> ' . '</div>';
										}else{
											echo '<div>' . '<img style="border-radius:100%;height: 150px;width: 150px;margin: auto;"src="images/female.png" alt="Female"/> ' . '</div>';
										}											
									?>
								</div>									
								<div class="form-group" style="margin-top: 20px;height:380px;">
									<div class="row" style="height:84px;">
										<?php													
											echo '<div id="echoDiv1" class="col-md-12 col-sm-12 border">' . 
													'<div class="row">'.
														'<div class="col-md-12 col-sm-12 div-echoChatDiv">' . $row["uname"] . '</div>' .															
														'<div class="col-md-12 col-sm-12 div-echoChatDiv">'  . $row["email"] . '</div>' .
													'</div>'.	
											'</div>';														
										?>
									</div>
									<div class="row" style="margin-top: 15px;">
										<div class="col-md-12 col-sm-12">						
											<input id ="searchChat" type="text" autocomplete="off" placeholder="Search Message" class="form-control" arial-label="Search" name="search"/>
											<div class="col-md-12 col-sm-12">
												<div class="row">
													<div id="resultSearcChat" style="padding-bottom: 10px;"></div>
												</div>
												
											</div>					
										</div>
									</div>	
								</div>					
							</div>																				
							<div class="col-md-1 col-sm-12"></div>
							<div class="col-md-7 col-sm-12" style="background-color:white;border-radius: .25rem;">
								<form action="<?php $_SERVER["PHP_SELF"];?>" onsubmit ="return false;" id = "frmData" method="post">
									<div class="form-group">
										<div class="chatDiv ">
										
										<!-- chat -->
										
											<input id="sender" value="<?php echo(isset($_SESSION["userId"]))?$_SESSION["userId"]:'';?>" type="hidden" name="sender"/>
											<input id="receiver" value="<?php echo(isset($row["id"]))?$row["id"]:'';?>" type="hidden" name="receiver"/>
											<!--<div style="height:20px"></div>-->
											<div id="chatContainer" class="scrollable chat-height"></div>
											
											<!-- emoji -->
											<div id="bottomDiv">
												<img id ="backImage" style="display: none;" src="images/button.png" alt="Button"/>
											</div>
											<div id="emojiDiv" class="emoji">
												<span class="close">&times;</span>
												<div class="emoji-content scrollable">
												<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
													<span class="final-emoji"></span>
												</div>
											</div>	
											<div class="row" style="margin-top: 15px;">     
												<div class="col-md-1 col-sm-12">
													<div value="scale" style="height: 40px;width: 40px;margin-left: 16px;cursor:pointer;margin-top: 2px;">
														<input id="button" value="slide" type="hidden"/>
														<img src="images/emoji2.png" alt="emoji2" onclick="emoji();"/>																																	
													</div>																
												</div>
												<div class="col-md-9 col-sm-12">
													<input id="textarea" class="textarea" placeholder="Type a message" name="content"/>
												</div>															
												<div class="col-md-1 col-sm-12">																
													<input id = "send" type="image" src="images/send.jpg" alt="Send" class="button-send"/>																
												</div>
											</div>
										</div>	
									</div>
								</form> 	
							</div>
						</div>                                                
                    </div>
                </div>
            </div>
		</div>
	</div>
<script src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>	
<script src="js/main.js"></script>
<script type="text/javascript">
	function emoji(){
		var x = document.getElementById("emojiDiv");
		var selectedEffect = $( "#button" ).val();
		if(x.style.display !== "none"){
			document.getElementById("chatContainer").style.height = "350px";
			document.getElementById("bottomDiv").style.bottom = "270px";
			$( "#emojiDiv" ).show( selectedEffect,500);
			scrollMaxH();
		}
		if(x.style.display === "none"){
			document.getElementById("chatContainer" ).style.height = "350px";
			document.getElementById("bottomDiv").style.bottom = "270px";
			$( "#emojiDiv" ).show( selectedEffect,500);
			scrollMaxH();
		}
	}
	var closebtns = document.getElementsByClassName("close");
	for (var i = 0; i < closebtns.length; i++) {
	  closebtns[i].addEventListener("click", function() {
		this.parentElement.style.display = 'none';
		document.getElementById("chatContainer").style.height = "550px";
		document.getElementById("bottomDiv").style.bottom = "80px";
	  });
	}
	
	$("#send").on('click', function (e) {		
		e.preventDefault(); 
		$.ajax({
			method : 'POST',
			async : true,
			url: 'chatcontentprocess.php', 
			data: $('#frmData').serialize(),
			beforeSend : function(){
				$("#textarea").val("");
				scrollMaxH();
			}
		});
	});
		
	function refreshChat(){
		// var today = new Date();
		// var timeJs = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var dateJs =  day+(day<10 ? "0" : "") + "/" +(month<10 ? "0" : "") + month + "/" + d.getFullYear();
		
		var revJs = $("#receiver").val();
		var senJs = $("#sender").val();	
		$.ajax({
			url:"chatrefresh.php",
			type :"POST",
			async : true,
			data:{sender:senJs,receiver:revJs,date:dateJs},
			dataType:"text",
			success:function(data){							
				$("#chatContainer").html(data);				
			},failure : function(){
				//alert ("ajax faild");
			}  
		});			
	}
	$(document).ready(function(){
		// setInterval(function(){ 
			refreshChat();			
		// }, 1000);		
	});
	
	$(document).ready(function(){
		setInterval(function(){ 
			$("#searchChat").on("keyup input", function(e){
				e.preventDefault();
				
				var inputVal = $("#searchChat").val();
				var resultDropdown = $("#resultSearcChat");
				var revJs = $("#receiver").val();
				var senJs = $("#sender").val();	
				
				if(inputVal.length){
					$.post("searchbarchat.php",{
						chatSerach: inputVal,				
						sender:senJs,
						receiver:revJs
					}).done(function(data){
						$( "#resultSearcChat" ).show();					
						resultDropdown.html(data);
						document.getElementById("resultSearcChat").style;			
					});
				} else{
					resultDropdown.empty();
					$( "#resultSearcChat" ).hide();
				}
			});		
			
			$(document).on("click", ".result p", function(){
				$(this).parents("#searchChat").find('input[type="text"]').val($(this).text());
				$(this).parent("#resultSearcChat").empty();				
			});
		}, 1000);	
	});
	
	function scrollMaxH() {
		const messages = document.getElementById("chatContainer");		
		shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
		if (!shouldScroll) {
			messages.scrollTop = messages.scrollHeight;					
			shouldScroll = false;
		} else if (shouldScroll) {
			messages.scrollTop = messages.scrollHeight;
		}		
	}	
	$(document).ready(function(){
		$("#bottomDiv").on("click",function(){
			scrollMaxH();
		});	
	});
		
	$(window).on("load",function(){	
		var t = setInterval(function(){ 
			const messages = document.getElementById("chatContainer");
			
			var shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
			
			if (shouldScroll!=0) {
				messages.scrollTop = messages.scrollHeight;	
			} 
			if (shouldScroll==0) {				
				if(shouldScroll<shouldScroll+1){
					messages.scrollTop = messages.scrollHeight;
					clearInterval(t);	
				}
				shouldScroll = false;
			}	
			// if (t!=0) {
				// shouldScroll = false;
				// clearInterval(t);
			// }	
		},100);
	});

	$("#chatContainer").on("scroll",function(){		
		scrollFunction();		
	});
	$("#chatContainer").on("click",function(){	
		scrollMaxH();		
	});
	function scrollFunction() {
		const messages = document.getElementById("chatContainer");
		var backDiv = document.getElementById("bottomDiv");
		var backImage = document.getElementById("backImage");
		var hT = messages.clientHeight - messages.scrollTop;
		var h =  messages.clientHeight;
		if (h>(hT+190)) {
			backDiv.style.display = "none";
			backImage.style.display = "none";
		} else{
			backDiv.style.display = "block";
			backImage.style.display = "block";
		}
	}
</script>
	
</body>
</html>													