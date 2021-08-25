<div class="row">									
	<div class="col-md-5 col-sm-12">
        <div class="form-control" style="margin-bottom: 34px;">
			<?php	
				if(!empty($_SESSION['userName'])){
					if($_SESSION['gender']=="M"){
						echo '<div id="userDiv" class="userDiv">'.
								'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
									'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/male.png" alt=" Male"/> ' .
								'</div>' .
								'<div style="width: 330px !important;margin-left: 70px;" class="div-userDiv">' . $_SESSION["userName"] . '</div>' .
								'<div style="margin-top:10px;">' . '</div>' .
								'<div style="width: 330px !important;margin-left: 70px;" class="div-userDiv">' . $_SESSION["email"] . '</div>' . 
							'</div>';
						}else{
							echo '<div id="userDiv" class="userDiv">'.
									'<div style="border-radius:50%;height:50px;width:50px;float:left">' .
										'<img style="border-radius:100%;height:50px;width:50px;margin: auto;"src="images/female.png" alt=" Female"/> ' .
									'</div>' .
									'<div style="width: 330px !important;margin-left: 70px;" class="div-userDiv">'  . $_SESSION["userName"] . '</div>' .
									'<div style="margin-top:10px;">' . '</div>' .
									'<div style="width: 330px !important;margin-left: 70px;" class="div-userDiv">' . $_SESSION["email"] . '</div>' . 
								'</div>';
						}			
				}
			?>
		</div>                                       
	</div>
	<!--<div class="col-md-4 col-sm-12"></div>
	<div class="col-md-3 col-sm-12">
		<a href="index.php"><input class="button-sign-in" type="submit" value="Log Out "/></a>
	</div> -->
</div>
<script src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>	