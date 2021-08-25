<?php 
	
	if(sizeof($_POST)>0){
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="chatting-system";
		$port="3308";
		
		//var_dump($_POST);		
		$sen=$_POST["sender"];	
		$rev=$_POST["receiver"];
				
		if($_POST["content"]==null){			
			return 0;				
		}else{
			$text=$_POST["content"];
			$contentQuery="insert into `chat_content` (`senderId`,`receiverId`,`content`,`current_time`) values ('".$sen."','".$rev."','".$text."',CURRENT_TIMESTAMP)";
		}
		$conn = mysqli_connect($servername, $username, $password, $dbName, $port);		
		
		/*
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			if ($conn->query($contentQuery) === TRUE) {
				//	echo "New record created successfully";
			} else {
				echo "Error: " . $contentQuery . "<br>" . $conn->error;
			}
			$conn->close();
		*/
		
	}
?>