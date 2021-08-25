<?php
	if(sizeof($_POST)>0){
		
		$uname="";
		$email="";
		$gender="";
		$phone="";
		$password="";
		
		
			// var_dump($_POST);
			if($_POST["uname"]!=null){
				$uname=$_POST["uname"];
			}
			if($_POST["email"]!=null){
				$email=$_POST["email"];
			}
			if($_POST["gender"]!=null){
				$gender=$_POST["gender"];
			}
			if($_POST["phone"]!=null){
				$phone=$_POST["phone"];
			}
			if($_POST["password"]!=null){
				$password=$_POST["password"];
			}
			
			$query="insert into users (uname,email,gender,phone,password) values ('".$uname."','".$email."','".$gender."','".$phone."','".$password."');";

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "chatting-system";
			$port="3308";
			
			if($_POST["uname"] && $_POST["email"] && $_POST["gender"] && $_POST["phone"] && $_POST["password"]!=null){

				echo "<script> alert('You Are Succesfully Registered');</script>";
			//	header("Location: index.php");//redirection		
			}
			
			$conn = mysqli_connect($servername, $username, $password, $dbname, $port);						
			/*
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if ($conn->query($query) === TRUE) {
				//	echo "New record created successfully";
			} else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}

			$conn->close();*/
			
	}
	
?>
<div class="col-md-8 col-sm-12">
	<div class="text-center" style="margin-bottom: 70px;!important">
		<div style="height:40px;"></div>
		<h2>Create Account</h2>  				
	</div>
	<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
		<div class="row">     
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<input id="uname" type="text" placeholder="Enter Your Name" name="uname" class="form-control" required=""/>
				</div>
			</div>										
		</div>									
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<input  id="email" type="email" placeholder="Enter Your Email ID" name="email" class="form-control" required=""/>
				</div>
			</div>										
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-2 col-sm-12">
				<div class="form-group">
					Gender 
				</div>
			</div>
			M<div class="col-md-2 col-sm-12 gender-space">
				<input id="male" type="radio" name="gender" value="M" class="form-control gender" required=""/>
			</div>
			F<div class="col-md-2 col-sm-12 gender-space">
				<input id="female" type="radio" name="gender" value="F" class="form-control gender" required=""/>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<input id="cont" type="contact" placeholder="+91 " name="phone" class="form-control" maxlength="10" required=""/>
				</div>
			</div>										
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<input id="pas" type="password" name="password" placeholder="Set Password" class="form-control" required=""/>
					<div id="seenPas" class="seen"><img id="seen1" style="width: 20%;" src="images/hide.png" alt="hide"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<input id="conPas" type="password" name="con-password" placeholder="Confirm Password" class="form-control" required=""/>
					<div id="seenConPas"  class="seen"><img id="seen2" style="width: 20%;" src="images/hide.png" alt="hide"></div>
				</div>
			</div>
		</div>								
		<div class="row">
			<div class="col-md-3 col-sm-12"></div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group mb-0">
					<input class="button-sign-in" id="sub" type="submit" value="SIGN IN" class="btn-send"/>
				</div>
			</div>										
		</div>
	</form>
</div>
<script src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>	
<script src="js/main.js"></script>	
<script type="text/javascript">

	

	


</script>




