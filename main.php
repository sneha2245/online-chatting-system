<?php include 'searchbar.php'?>
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
	<div class="pt-70 pb-70">
		<div class="container">	
			<!-- Haeder -->	
			<?php include 'mainheader.php'?>
			<div class="row">
				<div class="col-md-12 offset-md-1">
					<div class="contact-comment-section">
						<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
							<fieldset>
								<div class="row">								
									<!-- Avaliable Users-->
										<?php include 'availableusers.php'?>
									<div class="col-md-2 offset-md-1"></div>
									<!--Group Chat-->	
										<?php //include 'groupchat.php'?>									
								</div>		
							</fieldset>
						</form>                     
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>				
	<script src="js/main.js"></script>				
</body>
</html>	