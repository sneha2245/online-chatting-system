<div class="col-md-5 col-sm-12">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="form-control">
				<div style="border-bottom:1px solid black;width:">
					<div class="row">
						<div class="col-md-10 col-sm-12">
							<h3 >Chat</h3>
						</div>						
						<div class="col-md-2 col-sm-12">
							<svg style="margin-bottom: 0px;margin-top: 12px;cursor: pointer;" viewBox="0 0 24 24" width="24" height="24" onclick="menu();">
								<path fill="currentColor" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path>
							</svg>
						</div>
						<div class="btn-group">
							<div id="menu_select" style="display:none;" class="dropdown-menu menu">
								<div style="margin-left: 20px;cursor: pointer;">Create Group</div>
								<a href="logout.php">
									<div id="logOut" style="margin-left: 20px;cursor: pointer;" title="Logout">Log Out</div>
								</a>
							</div>
						</div>						
					</div>
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-md-12 col-sm-12">						
							<input id ="searchBar"type="text" autocomplete="off" placeholder="Search Available User's" class="form-control" arial-label="Search" name="search"/>
							<div class="result col-md-12 col-sm-12">
								<div id="result" class="col-md-12 col-sm-12">
								</div>
							</div>					
						</div>
					</div>					
				</div>
				<div id="avaliableChat" class="scrollable" style="height: 520px;">
					<?php							
							$servername="localhost";
							$username="root";
							$password="";
							$dbName="chatting-system";
							$port="3308";
							
							$q1="select * from users";
							
							$conn = mysqli_connect($servername, $username, $password, $dbName, $port);

							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
							}
								
							$result = mysqli_query($conn, $q1);
							
												
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {							
								if($_SESSION['userName']!=$row["uname"]){
									$row++;
									$rev=$row["id"];
									$sen=$_SESSION["userId"];
									
									// $lastMessageQ="select * from chat_content as c where c.id=(select max(c1.id) from chat_content c1 where (c1.senderId = '".$sen."' and c1.receiverId = '".$rev."') or (c.senderId = '".$rev."' and c.receiverId = '".$sen."' ) order by(c1.id))";
									$lastMessageQ = "select * from (select distinct * from chat_content as c where (c.senderId = '".$sen."' and c.receiverId = '".$rev."') or (c.senderId = '".$rev."' and c.receiverId = '".$sen."' ) order by c.id desc) as m group by (m.senderId and m.receiverId)";
									$LastMessageResult = mysqli_query($conn, $lastMessageQ);
									
									if (mysqli_num_rows($LastMessageResult) > 0) {

										while($LMessagerow = mysqli_fetch_assoc($LastMessageResult)) {
											$lastMessage=$LMessagerow["content"];
											$datePicker=$LMessagerow["current_time"];
											$date = date('d/m g:i a',strtotime($datePicker));
											
											if($row["id"]>0){
											
												if($row['gender']=="M"){
													echo '<a href="chat.php?id= '.$row["id"].'" header("Location: main.php");>
															<div id="divMale" class="echoDiv border-avaliable">' . 
																'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
																	'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/male.png" alt=" Male"/> ' .
																'</div>' .
																'<div class="row">'.
																	'<div class="col-md-8 col-sm-12">'.
																		'<div style="width: 330px !important;" class="div-echoDiv">' . $row["uname"] . '</div>' . 
																	'</div>'.
																	// '<div class="col-md-8 col-sm-12">'.
																		// '<div style="width: 330px !important; " class="div-echoDiv">' . $row["email"] . '</div>'.
																	// '</div>'.
																	'<div class="col-md-2 col-sm-12">'.
																		'<div style="width: 330px !important;font-size: 13px;" class="div-echoDiv margin-left">' . $date . '</div>' . 
																	'</div>'.
																'</div>'.
																'<div class="row">'.
																	'<div class="col-md-12 col-sm-12">'.
																		'<div style="width: 330px !important;" class="div-echoDiv margin">' . $lastMessage . '</div>' . 
																	'</div>'.
																	// '<div class="col-md-2 col-sm-12">'.
																		// '<div style="width: 330px !important;" class="div-echoDiv margin margin-left">' . $date . '</div>' . 
																	// '</div>'.
																'</div>'.	
															'</div>
														</a>';
												}else {
													echo '<a href="chat.php?id= '.$row["id"].'" header("Location: main.php");>
															<div id="divFemale" class="echoDiv border-avaliable">' . 
																'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
																	'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/female.png" alt="Female"/> ' .
																'</div>' .
																'<div class="row">'.
																	'<div class="col-md-8 col-sm-12">'.
																		'<div style="width: 330px !important;" class="div-echoDiv">' . $row["uname"] . '</div>' . 
																	'</div>'.
																	// '<div class="col-md-8 col-sm-12">'.
																		// '<div style="width: 330px !important; " class="div-echoDiv">' . $row["email"] . '</div>'.
																	// '</div>'.
																	'<div class="col-md-2 col-sm-12">'.
																		'<div style="width: 330px !important;font-size: 13px;" class="div-echoDiv margin-left">' . $date . '</div>' . 
																	'</div>'.
																'</div>'.
																'<div class="row">'.
																	'<div class="col-md-12 col-sm-12">'.
																		'<div style="width: 330px !important;" class="div-echoDiv margin">' . $lastMessage . '</div>' . 
																	'</div>'.
																	// '<div class="col-md-2 col-sm-12">'.
																		// '<div style="width: 330px !important;" class="div-echoDiv margin margin-left">' . $date . '</div>' . 
																	// '</div>'.
																'</div>'.
															'</div>
														</a>';
												}
												break;
											}
										}
									}
								}
							}$row++;
						}
						mysqli_close($conn);
					?>
				</div>
			</div>                                      
		</div>
	</div>
</div>	

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>	
<script src="js/jquery-min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
	
	$("#avaliableChat").ready(function(){
		 setInterval(function(){ 
			// sconsole.log("avaliableChat");
		}, 1000);		 
	});
	
	
	function menu(){
		var x = document.getElementById("menu_select");
		//var selectedEffect = $( "#menu_select" ).val();
		//alert(selectedEffect);
		if(x.style.display === "none"){			
			$( "#menu_select" ).show();				
		}else{			
			//x.style.display = "none";
			$( "#menu_select" ).hide();
		}
	}	
	
	$(document).ready(function(){
		$("#searchBar").on("keyup input", function(){
			
			var inputVal = $("#searchBar").val();
			var resultDropdown = $("#result");
			
			if(inputVal.length){
				$.post("searchbar.php", {term: inputVal}).done(function(data){
					$( "#result" ).show();					
					resultDropdown.html(data);
					document.getElementById("result").style;			
				});
			} else{
				resultDropdown.empty();
				$( "#result" ).hide();
			}
		});		
		
		$(document).on("click", ".result p", function(){
			$(this).parents("#searchBar").find('input[type="text"]').val($(this).text());
			$(this).parent("#result").empty();				
		});
	});
</script>