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
	$photo = $result[0]['photo'];

	// user profile update
	if(isset($_POST['updateProfile'])){
		$up_name = $_POST['up_name'];
        $up_email = $_POST['up_email'];
        $up_mobile = $_POST['up_mobile'];
        $up_father_name = $_POST['up_father_name'];
        $up_mother_name = $_POST['up_mother_name'];
        $up_address = $_POST['up_address'];
        $up_birthday = $_POST['up_birthday'];
        $up_gender = $_POST['up_gender'];
        $photo_name = $_FILES['photo']['name'];

		if(empty($up_name)){
            $error = 'Name is Required!';
        }
		else if(empty($up_email)){
			$error = 'Email is Required!';
		}
		else if(!filter_var($up_email, FILTER_VALIDATE_EMAIL)){
			$error = 'Invalid email format!';
		}
		else if(empty($up_mobile)){
			$error = 'Mobile Number is Required!';
		}
		else if(!is_numeric($up_mobile)){
			$error = 'Mobile Number is Must de Number!';
		}
		else if(strlen($up_mobile) != 11){
			$error = 'Mobile Number is Must de 11 Digit!';
		}
		else if(empty($up_father_name)){
			$error = 'Father name is Required!';
		}
		else if(empty($up_mother_name)){
			$error = 'Mother name is Required!';
		}
		else if(empty($up_address)){
			$error = 'Address is Required!';
		}
		else if(empty($up_birthday)){
			$error = 'Birthday is Required!';
		}
		else if(empty($up_gender)){
			$error = 'Gender is Required!';
		}

		else{

			if(!empty($photo_name)){
				$target_dir = "assets/images/students/";
				$target_file = $target_dir . basename($_FILES["photo"]["name"]);
				$extenstion = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				if($extenstion != 'png' && $extenstion != 'jpg' && $extenstion != 'jpeg'){
					$error = 'Photo is must be png or jpg!';
				}
				else{
					$temp_name = $_FILES["photo"]["tmp_name"];
					$final_path = $target_dir . "user_id_". $user_id.".".$extenstion;
					move_uploaded_file($temp_name, $final_path);
				}
			}
			else{
				$final_path = Student("photo",$user_id);
			}
		}
		// update data
		$update = $pdo->prepare("UPDATE students SET name=?, email=?, mobile=?, father_name=?, mother_name=?, address=?, birthday=?, gender=?, photo=? WHERE id=?");
		$update->execute(array(
			$up_name,
			$up_email,
			$up_mobile,
			$up_father_name,
			$up_mother_name,
			$up_address,
			$up_birthday,
			$up_gender,
			$final_path,
			$user_id
		));

		$success = "Profile Update Successfully!";

	}

?>

<!--Main container start -->
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Update Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Update Profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Update Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile" action="" method="POST" enctype="multipart/form-data">
								<div class="">
									<!-- <div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>4. Password</h3>
										</div>
									</div> -->
									<div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-7">

                                            <?php if(isset($error)): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo $error; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if(isset($success)): ?>
                                                <div class="alert alert-success">
                                                    <?php echo $success; ?>
                                                </div>
                                            <?php endif; ?>
                                    
                                        </div>
                                    </div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Name :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_name" type="text" value="<?php echo $name; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Email :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_email" type="text" value="<?php echo $email; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Mobile Number :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_mobile" type="text" value="<?php echo $mobile; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Father Name :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_father_name" type="text" value="<?php echo $father_name; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Mother Name :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_mother_name" type="text" value="<?php echo $mother_name; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Address :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_address" type="text" value="<?php echo $address; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Birthday :</label>
										<div class="col-sm-7">
											<input class="form-control" name="up_birthday" type="date" value="<?php echo $birthday; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Gender :</label>
										<div class="col-sm-7">
											<label><input 
											<?php 
												if($gender == 'Male'){echo 'checked';}
											?>
											name="up_gender" value="Male" type="radio" checked> Male</label> &nbsp;
											<label><input 
											<?php 
												if($gender == 'Female'){echo 'checked';}
											?>
											name="up_gender" value="Female" type="radio"> Female</label>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Profile photo :</label>
										<div class="col-sm-7">
											<?php if($photo != null):?>
												<div class="profile_photo">
													<a target="_blank" href="<?php echo $photo;?>"> <img style="height:100px;width:auto;" src="<?php echo $photo;?>"></a>
												</div>
											<?php endif;?>
											<mark><small>If won't change photo, skip the input field.</small></mark>
											<input type="file" class="form-control" name="photo">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<button name="updateProfile" type="submit" class="btn green radius-xl outline">Update Profile</button>
										<a href="profile.php" class="btn red outline radius-xl">Cancel</a>
									</div>
								</div>
									
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<?php require_once('footer.php');?>