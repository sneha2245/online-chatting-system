<?php
	if(isset($_REQUEST["chatSerach"])){
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="chatting-system";	
		$port="3308";
		$conn = mysqli_connect($servername, $username, $password, $dbName, $port);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// var_dump($_POST);	
		$sen=$_POST["sender"];	
		$rev=$_POST["receiver"];	
		
		// $sql = "select * from users left join chat_content on chat_content.senderId = users.id where ((chat_content.senderId = ".$sen." and chat_content.receiverId = ".$rev.") or (chat_content.senderId = ".$rev." and chat_content.receiverId = ".$sen.")) and chat_content.content like ? order by(chat_content.id)";
		
		
		$sql = "select * from chat_content where ((chat_content.senderId = ".$sen." and chat_content.receiverId = ".$rev.") or (chat_content.senderId = ".$rev." and chat_content.receiverId = ".$sen."))and content like ? order by(chat_content.id)";
		
		if($stmt = mysqli_prepare($conn, $sql)){
		   mysqli_stmt_bind_param($stmt,"s",$param_term);
			$param_term = $_REQUEST["chatSerach"] . '%';
			if(mysqli_stmt_execute($stmt)){
				$result = mysqli_stmt_get_result($stmt);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						
						$datePicker=$row["current_time"];
						$date = date('d/m/yy g:i a',strtotime($datePicker));
						
						echo '<div class="col-md-12 col-sm-12">'.
								'<div class="row">'.
									'<div class="col-md-12 col-sm-12">'.
										'<div class="serach_chat_time">'.
											$date.
										'</div>'.
										'<div class="serach_chat">'.
											$row["content"].
										'</div>'.
										'<div style="margin-top: 10px;" class="border-avaliable">'.'</div>'.
									'</div>'.									
								'</div>'.
							'</div>';
					}
				}else{
					echo '<h5 style="margin-top: 10px;margin-left: 10px;">No matches found</h5>';
				}
			}else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
			
			
			
		}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	
?>