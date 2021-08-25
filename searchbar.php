<?php
	session_start();
	if(isset($_REQUEST["term"])){
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="chatting-system";	
		$port="3308";
		$conn = mysqli_connect($servername, $username, $password, $dbName, $port);
	 
		if(!$conn){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		$sql = "select * from users where uname like ?";
		
		if($stmt = mysqli_prepare($conn, $sql)){
		   mysqli_stmt_bind_param($stmt,"s",$param_term);
			$param_term = $_REQUEST["term"] . '%';
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);				
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						if($_SESSION["userName"]!=$row["uname"]){
							$row++;
							if($row['gender']=="M"){
								echo '<a href="chat.php?id= '.$row["id"].'" header("Location: main.php");>'.								
										'<div id="echoDiv"  style="width: 380px !important;margin-bottom: 5px;margin-top: 10px;" class="echoDiv border-avaliable">' . 
											'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
												'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/male.png" alt=" Male"/> ' .
											'</div>' .
											'<div style="width: 270px !important;" class="div-echoDiv">' . $row["uname"] . '</div>' . 
											'<div style="width: 270px !important; " class="div-echoDiv margin">' . $row["email"] . '</div>'.
										'</div>'.	
									'</a>';
							}else {
								echo '<a href="chat.php?id= '.$row["id"].'" header("Location: main.php");>'.								
										'<div id="echoDiv"  style="width: 380px !important;margin-bottom: 5px;margin-top: 10px;" class="echoDiv border-avaliable">' . 
											'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
												'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/female.png" alt="Female"/> ' .
											'</div>' .
											'<div style="width: 270px !important;" class="div-echoDiv">' . $row["uname"] . '</div>' . 
											'<div style="width: 270px !important; " class="div-echoDiv margin">' . $row["email"] . '</div>'.
										'</div>'.	
									'</a>';
							}
						}
					}$row++;
				}else{
					echo '<h5 style="margin-top: 10px;">No matches found</h5>';
				}
			}else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	
?>