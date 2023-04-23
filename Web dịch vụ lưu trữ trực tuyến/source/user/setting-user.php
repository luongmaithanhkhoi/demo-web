<?php
   require_once("../db.php");
   require_once("../usercontroller.php");
   $user = (new UserController())->check($_SESSION['username']);
?>
<?php
   $us ='';
   $error = $use_id = '';
   $msg = '';
   $name = $email = "";
   require_once("../db.php");
   require_once("../usercontroller.php");
   if(isset($_POST['btnChangeInfor'])){
		if(isset($_POST['name'])) {
			$name= $_POST['name'];
		}
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}   
      $use_name =  trim($_SESSION['username']);
		require_once("../usercontroller.php");
		$user = (new UserController())->check($use_name);
      $use_id =  $user->id;
      $sql = "UPDATE `users`  SET name = '$name', email  = '$email' WHERE id = '$use_id'";
      mysqli_query($conn,$sql);
      $_SESSION['username'] = $name;
      $msg = 'Change successful';
   }

?>
<?php
	$us ='';
	$error = '';
	$msg = '';
	$npass = $pass = $rpass = "";
	if(isset($_POST['btnChangePass'])){
		if(isset($_POST['pass'])) {
			$pass= $_POST['pass'];
		}
		if(isset($_POST['npass'])) {
			$npass = $_POST['npass'];
		}
		if(isset($_POST['rpass'])) {
			$rpass = $_POST['rpass'];	
		}
		require_once("../usercontroller.php");
		$user = (new UserController())->checkpass($pass);
		if (!$user->password == $pass) {
			$error = 'Password isnot connect';
		} 
		else if (strlen($npass) < 6) {
			$error = 'New Password must have at least 6 characters';
		} else if ($npass != $rpass) {
			$error = 'Comfir Password not same Password';
			
		}
		else {
         $use_name =  trim($_SESSION['username']);
         echo $use_name;
         $sql = "UPDATE `users`  SET password = '$npass' WHERE name = '$use_name'";
         mysqli_query($conn,$sql);
         $msg = 'Change password successful';
		}	
	}
?>
<div class="filebob_dash py-4">
   <div class="row">
      <div class="col-lg-5">
         <div class="sec__title">
            <h1>Profile information</h1>
            <p>Here you can update your profile information</p>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="alert alert-danger print-error-msg" style="display:none"><span></span></div>
         <div class="card">
            <form id="informationForm" method="POST" enctype="multipart/form-data">
               <div class="card-body">
               <div style="color:green; font-size:20px;"><?php echo $msg?> </div>
                  <div class="rounded-circle avatar avatar-xl mb-3">
                     <img class="rounded-circle" id="preview_avatar" src="../images/default.png" width="100" height="100">
                  </div>
                  <div class="form-group">
                     <label for="name">Name:</label>
                     <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="<?php echo $user->name?>" required>
                  </div>
                  <div class="form-group">
                     <label for="name">Email:</label>
                     <input class="form-control" id="email" name="email" type="text" placeholder="Enter your email"  value="<?php echo $user->email?>" required>
                  </div>
               </div>
               <div class="card-footer text-right">
                  <button name="btnChangeInfor"  type="submit" id="saveInfoBtn" class="btninfo btn" style="background-color: blue;  color:white;">
                  <span class="spinner-border-info spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                  Save
                  </button>
                  <div style="color:red; font-size:20px;"><?php echo $error?> </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="row py-5">
      <div class="col-lg-5">
         <div class="sec__title">
            <h1>Security information</h1>
            <p>Here you can change your password</p>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="alert alert-danger print-error-msg-sec" style="display:none"><span></span></div>
         <div class="card">
            <form id="passwordForm" method="POST" class="mt-2">
               <div style="color:green; font-size:20px;"><?php echo $msg?> </div>
               <div class="card-body">
                  <div class="form-group">
                     <label for="new-password" class="control-label">Current Password:</label>
                     <input id="currentpassword" type="pass" class="form-control" name="pass">
                  </div>
                  <div class="form-group">
                     <label for="new-password" class="control-label">New Password:</label>
                     <input id="newpassword" type="password" class="form-control" name="npass" required>
                  </div>
                  <div class="form-group">
                     <label for="new-password-confirm" class="control-label">Confirm New Password:</label>
                     <input id="newpasswordconfirm" type="password" class="form-control" name="rpass" required>
                  </div>
               </div>
               <div class="card-footer text-right">
                  <button id="savePassBtn" type="submit" name="btnChangePass" class="btnpass btn" style="background-color: blue;  color:white;">
                  <span class="spinner-border-pass spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>Save</button>
                  <div style="color:red; font-size:20px;"><?php echo $error?> </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
