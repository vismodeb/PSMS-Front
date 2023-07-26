<?php

	if(isset($_POST['$st_regSubmit'])){
		$st_name = $_POST['st_name'];

		if(empty($st_name)){
			$error = 'Name is Required!';
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="PSMS - Student Registration" />
	
	<!-- OG -->
	<meta property="og:title" content="PSMS - Student Registration" />
	<meta property="og:description" content="PSMS - Student Registration" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>PSMS - Student Registration</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
	<div class="page-wraper">
		<div id="loading-icon-bx"></div>
		<div class="account-form">
			<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
				<a href="index.php"><img src="assets/images/logo-white-2.png" alt=""></a>
			</div>
			<div class="account-form-inner">
				<div class="account-container">
					<div class="heading-bx left">
						<h2 class="title-head">Student <span>Registration</span></h2>
						<p>Login Your Account <a href="login.php">Click here</a></p>
					</div>	

					<?php if(isset($error)) : ?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>

					<?php if(isset($success)) : ?>
						<div class="alert alert-success">
							<?php echo $success; ?>
						</div>
					<?php endif; ?>

					<form class="contact-bx" action="" method="POST">
						<div class="row placeani">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Student Name</label>
										<input name="st_name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Email Address</label>
										<input name="st_email" type="email" class="form-control" id="st_email">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Mobile Number</label>
										<input name="st_mobile" type="text" class="form-control" id="st_mobile">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Father Name</label>
										<input name="st_father" type="text" class="form-control" id="st_father">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Mother Name</label>
										<input name="st_mother" type="text" class="form-control" id="st_mother">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>Address</label>
										<input name="st_address" type="text" class="form-control" id="st_address">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Birthday</label><br>
									<input type="date" name="st_birthday" class="form-control">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label>Gender:</label><br>
									<label><input name="st_gender" value="Male" type="radio" id="st_gender" checked> Male</label> &nbsp;
									<label><input name="st_gender" value="Female" type="radio" id="st_gender"> Female</label>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group"> 
										<label>Password</label>
										<input name="st_password" type="password" class="form-control" id="st_password">
									</div>
								</div>
							</div>
							<div class="col-lg-12 m-b30">
								<button name="st_regSubmit" type="submit" value="Submit" class="btn button-md">Registration</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- External JavaScripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendors/counter/waypoints-min.js"></script>
	<script src="assets/vendors/counter/counterup.min.js"></script>
	<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
	<script src="assets/vendors/masonry/masonry.js"></script>
	<script src="assets/vendors/masonry/filter.js"></script>
	<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/contact.js"></script>
	<!-- <script src='assets/vendors/switcher/switcher.js'></script> -->
</body>

</html>
