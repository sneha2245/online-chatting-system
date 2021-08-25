<?php		
	if(sizeof($_POST)>0){
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
		
		$date=$_POST["date"];
		// $time=$_POST["time"];
			
		$sendQuery="select * from users left join chat_content on chat_content.senderId = users.id where (chat_content.senderId = ".$sen." and chat_content.receiverId = ".$rev.") or (chat_content.senderId = ".$rev." and chat_content.receiverId = ".$sen.") order by(chat_content.id)";	
		$final = mysqli_query($conn, $sendQuery);		
		
		if (mysqli_num_rows($final) > 0) {							
			while($rowSend = mysqli_fetch_assoc($final)) {
				
				$datePicker=$rowSend["current_time"];
				$date = date('g:i a',strtotime($datePicker));
				
				// if($rowSend["current_time"]>0){
					// $today = date('d/m/yy',strtotime($datePicker));
					
				// }


					
				// if($date<=$today){
					// echo $today;
				// }else if($date>=$today){
					// echo $today;
				// }

				if($sen==$rowSend["senderId"]){
					$firstname = strtok($rowSend["uname"],' ');
					echo '<div class="vW7d1 message-out div-space">' .
							'<div class="name-send">' . $firstname . '</div>' .
							'<div class="sender">' . 
								'<div class="message-box">' .
									'<span>' . $rowSend["content"] . '</span>' .
								'</div>' .
								'<div class="timer-box">' .
									'<span>' . $date . '</span>' .
								'</div>' .
							'</div>' .											
						'</div>';																			
				}else {	
					$firstname = strtok($rowSend["uname"], ' ');
					echo '<div class="vW7d1 message-in div-space">' .
							'<div class="name-out">' . $firstname . '</div>' . 
							'<div class="receiver">' . 
								'<div class="message-box">' .
									'<span>' . $rowSend["content"] . '</span>' .
								'</div>' .
								'<div class="timer-box">' .
									'<span>' . $date . '</span>' .
								'</div>' .
							'</div>' .											
						'</div>';													
				}
			}																				
		}
		
		mysqli_close($conn);
	}
?>