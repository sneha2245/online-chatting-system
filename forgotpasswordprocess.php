<?php 
// echo "hiiiiiiii";
	if(!empty($_GET["emailReset"])){
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="chatting-system";
		$port="3308";
		
		$rowEmail="";
		$rowId="";
		
		// var_dump($_GET);
		$emailForgot = $_GET["emailReset"];	
		$passwordForgot = $_GET["resetPassword"];	
		$conPasswordForgot = $_GET["resetConPassword"];	
		
		
		$conn = mysqli_connect($servername, $username, $password, $dbName, $port);	
		
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}		
		
		$emailValidation = "select * from users where email='".$emailForgot."'";
		
		$result = mysqli_query($conn, $emailValidation);
		
		
		if (mysqli_num_rows($result) > 0) {
			while($row= mysqli_fetch_assoc($result)) {				
				$rowEmail=$row["email"];
				$rowId=$row["id"];
				
			}
		}
		
		if($_GET["emailReset"]==$rowEmail){
			
			if($passwordForgot==$conPasswordForgot){

				$updatePssword="update users set password='".$passwordForgot."' where id='".$rowId."'";
				
				
			
				// if ($conn->connect_error) {
					// die("Connection failed: " . $conn->connect_error);
				// }

				// if ($conn->emailValidation($emailValidation) === TRUE)echo '<script> alert("You password is re-set")</script>';
					echo '<script> console.log("You email is correct")</script>';
				// } else {
					// echo "Error: " . $emailValidation . "<br>" . $conn->error;
				// }

				// $conn->close();
				
			}else{
				echo '<script> alert("Both Password Need to Same")</script>';
			}
			
		}else{
			echo '<script> alert("You email is wrong")</script>';
		}
	}
?>
<div id="forgotModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="max-width: 550px;">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
				<button type="button" style="outline: none;" class="close close_logIn" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="forgotForm" action="<?php $_SERVER["PHP_SELF"];?>" method="get">					
				<div class="modal-body">					
					<fieldset>
						<div class="row">									
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input id="emailReset" type="email" placeholder="Enter Your Email ID" name="emailReset" class="form-control" required=""/>
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input id="reset_password" type="password" name="resetPassword" placeholder="Re-Set Password" class="form-control" required=""/>
									<div id="SeenReset_password" style="left: 92%;" class="seen"><img id="seen4" style="width: 20%;" src="images/hide.png" alt="hide"></div>
								</div>
							</div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input id="reset_con_password" type="password" name="resetConPassword" placeholder="Conform Password" class="form-control" required=""/>
									<div id="SeenReset_con_password" style="left: 92%;" class="seen"><img id="seen5" style="width: 20%;" src="images/hide.png" alt="hide"></div>
								</div>
							</div>																
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<input id="snedForgot" type="submit" class="btn btn-primary" placeholder="Re-Set Your Password"/>						
				</div>						
			</form> 
		</div>
	</div>
</div>	
<script src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/main.js"></script>	