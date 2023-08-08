<?php require_once('header.php');

    if(isset($_POST['chang_pass'])){
        $current_pass = $_POST['current_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        $user_id = $_SESSION['st_loggedin'][0]['id'];
        $db_password = Student('dt_password',$user_id);

        if(empty($current_pass)){
            $error = 'Current Password is Required!';
        }
        else if(empty($new_pass)){
            $error = 'New Password is Required!';
        }
        else if(empty($confirm_pass)){
            $error = 'Confirem Password is Required!';
        }
        else if($db_password != SHA1($current_pass)){
            $error = 'Current Password is wrong!';
        }
        else if($new_pass != $confirm_pass){
            $error = "New Password & Confirm Password does'nt match!";
        }
        else{
            $update = $pdo->prepare("UPDATE students SET dt_password = ? WHERE id=?");
            $update->execute(array(SHA1($confirm_pass),$user_id));

            $success = 'Password change successfully!';
        }
    }

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Change password</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Change password</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Change password</h4>
						</div>

						<div class="widget-inner">
							<form class="edit-profile" atction="" method="POST">
                                <div class="">
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>1. Password</h3>
										</div>
									</div>
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
                                </div>

								<div class="">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="current_pass">Current Password</label>
										<div class="col-sm-7">
											<input class="form-control" id="current_pass" name="current_pass" type="password" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="new_pass">New Password</label>
										<div class="col-sm-7">
											<input class="form-control" id="new_pass" name="new_pass" type="password" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label" for="confirm_pass">Confirm Password</label>
										<div class="col-sm-7">
											<input class="form-control" id="confirm_pass" name="confirm_pass" type="password" value="">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<button name="chang_pass" type="submit" class="btn">Save changes</button>
										<a href="index.php" class="btn-secondry">Cancel</a>
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