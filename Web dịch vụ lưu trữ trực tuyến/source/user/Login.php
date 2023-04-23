<?php
	session_start();
	if (isset($_SESSION['username']) and $_SESSION['permission'] == 1) {
		header('Location: ../admin/index-admin.php');
		exit();
	}
	if (isset($_SESSION['username']) and $_SESSION['permission'] == 2) {
		header('Location: ../user/index-user.php');
		exit();
	}
	$us ='';
	$msg = '';
	$ps ='';
	if(isset($_POST['btnlogin'])){
		require_once("../usercontroller.php");
		$us = $_POST['user'];

		$ps = $_POST['pass'];
		// $hash_ps = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$user = (new UserController())->login($us, $ps);
		// var_dump($hash_ps);
		if (!$user->id) {
			$msg = 'Sai mat khau';
			$user->username = $us;
		}
		else {
			// if(password_verify($ps, $user->password) ===1)
			// {
				if( $user->permission === 1) {
					$_SESSION['username'] = $user->name;
					$_SESSION['userid'] = $user->id;
					$_SESSION['permission'] = $user->permission;
					header("Location:../admin/index-admin.php");
					die();
				}
				else {
					$_SESSION['username'] = $user->name;
					$_SESSION['userid'] = $user->id;
					$_SESSION['permission'] = $user->permission;
					// echo $_SESSION['userid'];
					header("Location:../user/index-user.php");
					die();
				}
			// } else {
			// 	$msg = 'Sai';
			// }
			
		}
	}
?>


<?php
	if(isset($_POST['btnSignUp'])){ 
		header("Location:register.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../js/control.js">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-6 divtext-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to login</h2>
								<p>Don't have an account?</p>
								<form action="#" method="post"> 
									<button name="btnSignUp" class="btn btn-white btn-outline-white">Sign Up</button>
								</form>
								<!-- <a href="/WWW/register.html" class="btn btn-white btn-outline-white">Sign Up</a> -->
							</div>
			      		</div>
						<div class="login-wrap p-4 p-lg-6">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
									<form class="signin-form" method = "post">
										<div class="form-group mb-3">
											<label class="label" for="name">Username</label>
											<input type="text" class="form-control" name="user" placeholder="Username" required >
										</div>
										<div class="form-group mb-3">
											<label class="label" for="password">Password</label>
											<input type="password" class="form-control btn1" name="pass" placeholder="Password" required>
                                            <i class="uil uil-eye-slash toggle"></i>
										</div>
										<div class="form-group">
											<button type="submit" name="btnlogin" class="form-control btn btn-primary submit px-3">Sign In</button>
											<div style="color:red"><?php echo $msg?> </div>
										</div>

										<div class="form-group d-md-flex">
											<div class="w-50 text-left">
                                                <p class="checkbox-wrap checkbox-primary mb-0">
                                                    <input type="checkbox" class="check-box">
                                                    <label for="remember">Remember me</label>
                                                </p>
											</div>
											<div class="w-50 text-md-right">
												<a href="forgotpass.php" onclick="ToForgotPass()">Forgot Password</a>
											</div>
										</div>
									</form>
								</div>	
							</div>
						</div>
		    		</div>
				</div>
			</div>
		</div>
    </section>
    <script src="../js/control.js"></script>
</body>
</html>
