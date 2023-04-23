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
        $msg = 'Change successfull';         
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
<div class="admin__settings">
    <div class="card mb-3">
        <div class="card-body text-center">
            <div class="rounded-circle avatar avatar-xl mb-2">
                <img class="rounded-circle" id="preview_avatar" src="../images/default.png" width="100" height="100">
            </div>
            <h2>
                <?php
                    print_r($_SESSION['username']);
                ?>
            </h2>
            <p class="text-muted"><?php echo $user->email ?></p>
        </div>
    </div>
    <div class="note note-danger print-error-msg" style="display:none"><span></span></div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Admin information</div>
                <form id="informationForm" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                    <div style="color:green; font-size:15px;"><?php echo $msg?> </div>
                    <div class="form-group">
                        <label for="name">Name: <span class="fsgred"></span></label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name" value="<?php echo $user->name?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email:<span class="fsgred"></span></label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Enter your email" value="<?php echo $user->email?>" required>
                    </div>
                    <button type="submit" id="saveAdminInfoBtn" class="btninfo btn" name="btnChangeInfor" style="background-color: blue;  color:white;">Save</button>
                    <div style="color:red; font-size:15px;"><?php echo $error?> </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Security information</div>
                <form id="passwordForm" method="POST" class="mt-2">
                    <div class="card-body">
                        <div style="color:green; font-size:15px;"><?php echo $msg?> </div>  
                        <div class="form-group">
                            <label for="new-password" class="control-label">Current Password:<span class="fsgred">*</span></label>
                            <input id="currentpassword" type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="new-password" class="control-label">New Password:<span class="fsgred">*</span></label>
                            <input id="newpassword" type="password" class="form-control" name="npass" required>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="control-label">Confirm New Password:<span class="fsgred">*</span></label>
                            <input id="newpasswordconfirm" type="password" class="form-control" name="rpass" required>
                        </div>
                        <button id="saveAdminPassBtn" type="submit" class="btnpass btn" name="btnChangePass" style="background-color: blue;  color:white;">Save</button>
                        <div style="color:red; font-size:15px;"><?php echo $error?> </div>
                    </div>
                </form>
            </div>
        </div>
   </div>
</div>
