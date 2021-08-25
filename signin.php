<?php 
	session_start();
	$email="";
	$pass="";
	$query="";
	$userName="";
	
	if(!empty($_GET["email"])){
		
		$email=$_GET["email"];	
		
		// echo '<script> console.log("'.$_GET["email"].'")</script>';
		// echo '<script> console.log("'.$_GET["passwordLog"].'")</script>';
		
		$query="select * from users where email='".$email."'";
		
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="chatting-system";
		$port="3308";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbName, $port);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
			if($row = mysqli_fetch_assoc($result)) {
				$userName=$row["uname"];
				$userId=$row["id"];
				$gender=$row["gender"];
				$emailAdd=$row["email"];
				$pass= $row["password"];
			}
		}
		
		if($_GET["passwordLog"]==$pass){
			$_SESSION["email"]=$email;
			$_SESSION["password"]=$password;
			$_SESSION["uname"]=$uname;
			$_SESSION["userName"]=$userName;
			$_SESSION["userId"]=$userId;
			$_SESSION["gender"]=$gender;
			header("Location: main.php");//redirection
		}else{
			echo '<script> alert("You Enter a Wrong Password")</script>' ;
		}
		
		
		mysqli_close($conn);
	}
?>
<div class="col-md-4 col-sm-12">									
	<div class="row" style="margin: 174px 0px 0px 44px;">  
		<div class="col-md-12">
			<h2>Welcome Back !</h2>
		</div>
	</div>
	<div class="col-md-12 col-sm-12">
		<input style="cursor: pointer;" id="create-user" data-toggle="modal" data-target="#logInModel" class="button-sign-in" type="submit" value="SIGN UP" />
		<div class="forgot_password" id="forgot" data-toggle="modal" data-target="#forgotModel" >Forgot Password ?</div>
		<!-- Modal -->
		<!-- LOG IN -->
			<div class="modal fade" id="logInModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="max-width: 550px;">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Log In</h5>
							<button type="button" style="outline: none;" class="close close_logIn" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?php $_SERVER["PHP_SELF"];?>" method="get">
							<div class="modal-body">					
								<fieldset>
									<div class="row">									
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<input type="email" placeholder="Enter Your Email ID" name="email" class="form-control" required=""/>
											</div>
										</div>	
									</div>	
									<div class="row">	
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<input id="logPassword" type="password" name="passwordLog" placeholder="Password" class="form-control" required=""/>
												<div id="SeenLogPassword" style="left: 92%;" class="seen"><img id="seen3" style="width: 20%;" src="images/hide.png" alt="hide"></div>
											</div>
										</div>																
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">							
								<button type="submit" class="btn btn-primary">Log In</button>
							</div>							
						</form> 
					</div>
				</div>
			</div>	
		<!-- Forgot Password -->	
		<?php include'forgotpasswordprocess.php'?>
	</div>	
</div>	

<script src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>	
<script src="js/main.js"></script>	
<script type="text/javascript">

	
</script>	