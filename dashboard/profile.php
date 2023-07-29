<?php

    require_once('header.php');

	$user_id = $_SESSION['st_loggedin'][0]['id'];

	$stm = $pdo->prepare("SELECT * FROM students WHERE id=?");
	$stm->execute(array($user_id));
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	$name = $result[0]['name'];
	$email = $result[0]['email'];
	$mobile  = $result[0]['mobile'];
	$father_name = $result[0]['father_name'];
	$mother_name = $result[0]['mother_name'];
	$address = $result[0]['address'];
	$birthday = $result[0]['birthday'];
	$gender = $result[0]['gender'];
	$roll = $result[0]['roll'];
	$currend_class = $result[0]['currend_class'];
	$registration_date = $result[0]['registration_date'];

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>User Profile</h4>
						</div>
						<div class="widget-inner">
							<div class="">
								<div class="row">
									<div class="col-sm-2">
										<b>Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $name; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Email :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $email; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Mobile Number :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $mobile; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Father Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $father_name; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Mother Name :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $mother_name; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Address :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $address; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Birthday :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $birthday; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Gender :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $gender; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Roll :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $roll; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Currend Class :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $currend_class; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-2">
										<b>Registration Date :</b>
									</div>
									<div class="col-sm-7">
										<?php echo $registration_date; ?>
									</div>
								</div>
							</div>
							<div class="">
								<div class="row mt-3">
									<div class="col-sm-7">
										<a href="edit_profile.php" class="btn">Edit Profile</a>
										<a href="index.php" class="btn-secondry">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<?php require_once('footer.php');?>