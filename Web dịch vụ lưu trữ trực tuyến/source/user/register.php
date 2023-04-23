<?php
	session_start();
	require_once("../db.php");
	$us ='';
	$error = '';
	$msg = '';
	$name = $email = $pass = $rpass = "";
	if(isset($_POST['btnSignUp'])){
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		if(isset($_POST['pass'])) {
			$pass = $_POST['pass'];
			// $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
		}
		if(isset($_POST['rpass'])) {
			$rpass = $_POST['rpass'];
			// $rpass = password_hash($_POST['rpass'], PASSWORD_BCRYPT);
		}
		require_once("../usercontroller.php");
		$user = (new UserController())->check($name);
		if ($user->name == $name) {
			$error = 'This username is existed';
		} 
		else if (strlen($pass) < 6) {
			$error = 'Password must have at least 6 characters';
		} else if ($pass != $rpass) {
			$error = 'Comfir Password not same Password';
			
		}
		else {
			if(filter_has_var(INPUT_POST,'btncheck')) {
				$role = 2; /// role users
				$sql = "INSERT INTO `users` (`name`, `email`, `permission`, `password`) VALUES ('$name','$email','$role','$pass')";
				mysqli_query($conn,$sql);
				$msg = 'Create account successful';
		   	}
			else {
				$error = 'You must agree with The Terms & Conditions';
			}
			// $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
			
		}	
	}
	
?>
<?php
	if(isset($_POST['btnSignIn'])){ 
		header("Location:Login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
								<h2>Welcome to register</h2>
								<p>Already Have Account ?</p>
								<form action="#" method="post"> 
									<button name="btnSignIn" class="btn btn-white btn-outline-white">Sign In</button>
								</form>
							</div>
			      		</div>
						<div class="login-wrap p-4 p-lg-6">
							<div class="d-flex">
								<div class="w-100">
									<div style="color:green"><?php echo $msg?> </div>
									<h3 class="mb-4">Sign Up</h3>
									<form action="#" class="signin-form" method = "post">
										<div class="form-group mb-3">
											<label class="label" for="email">Email</label>
											<input type="text" name="email" class="form-control" placeholder="Email" required>
										</div>
										<div class="form-group mb-3">
											<label class="label" for="name">Username</label>
											<input type="text" name="name" class="form-control" placeholder="Username" required>
										</div>
										<div class="form-group mb-3">
											<label class="label" for="password">Password</label>
											<input type="password" name="pass" class="form-control btn1" placeholder="Password" required>
                                            <i class="uil uil-eye-slash toggle"></i>
										</div>
										<div class="form-group mb-3" style="margin-top: -2rem;">
											<label class="label" for="password">Confirm Password</label>
											<input type="password" name="rpass" class="form-control btn2" placeholder="Confirm Password" required>
                                            <i class="uil uil-eye-slash toggle1"></i>
										</div>
										<div class="form-group d-md-flex" style="margin-top: -2rem;">
											<div class="text-left">
                                                <p class="checkbox-wrap checkbox-primary mb-0">
                                                    <input type="checkbox" name="btncheck" class="check-box">
                                                    <label for="remember">I Agree To The Terms & Conditions</label>
                                                </p>
											</div>
										</div>
										<div class="form-group">
											<button  class="form-control btn btn-primary submit px-3" name="btnSignUp">Sign Up</button>
											<div style="color:red"><?php echo $error?> </div>
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
