<?php
   require_once("../db.php");
	$us ='';
	$error = '';
	$msg = '';
	$name = $email = $pass = $rpass = "";
	if(isset($_POST['btnAdd'])){
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		if(isset($_POST['pass'])) {
			$pass = $_POST['pass'];
		}
		if(isset($_POST['rpass'])) {
			$rpass = $_POST['rpass'];
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
         $role = 1; /// role admin  
         $sql = "INSERT INTO `users` (`name`, `email`, `permission`, `password`) VALUES ('$name','$email','$role','$pass')";
         mysqli_query($conn,$sql);
         $msg = 'Create account successful';
			
		}	
	}
	
?>
<?php
   require_once("../db.php");
   if(isset($_GET['name'])) {
      $tam = $_GET['name'];  
   }
   $sql = "DELETE FROM  `users` WHERE name = '$tam'";
   // require_once("../db.php");
   // require_once("../usercontroller.php");
   // $user = (new UserController())->check($tam); 
   // $sql1 = "SELECT * FROM uploads where user_id = '$user->id'";
   // $result = mysqli_query($conn, $sql1);
   // $resultCheck = mysqli_num_rows($result);
   // echo "haa";
   // error_reporting(0);
   // while($row = mysqli_fetch_assoc($result)) {
   //    if($tam==  trim($row['id']))  {
   //       if(unlink('../user/uploads/'.trim($row['main_filename']))) {
   //          require_once("../db.php");
   //          $sql2 = "DELETE FROM  `uploads` WHERE id = '$tam'";
   //          mysqli_query($conn,$sql2);
   //       }
   //    }
   // }
   mysqli_query($conn,$sql);
?>

<link rel="stylesheet" href="../css/style1.css">
<div class="card">
   <div class="card-header">
      <h2 class="m-0">All users</h2>
   
      <span class="col-auto ms-auto d-print-none"  > 
         <button data-bs-toggle="modal" data-bs-target="#modal-simple"  class="btn" style="background-color: blue;  color:white;">
            <svg style="color:white;" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 11h6m-3 -3v6" /></svg>
          Add Admin
         </button>
      </span>
      <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Add new admin</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="note note-danger print-error-msg" style="display:none"><span></span></div>
                  <form id="addAdminForm" method="POST">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" id="name" class="form-control fm40" placeholder="Admin name" name="name" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control fm40" placeholder="Admin email" name="email" required>
                     </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control fm40" placeholder="Admin password" name="pass" required>
                     </div>
                     <div class="form-group">
                        <label for="confirm-password">Confirm password</label>
                        <input type="password" id="confirm-password" class="form-control fm40" placeholder="Confirm password" name="rpass" required>
                     </div>
                  </div>
                  <div class="modal-footer"> 
                     <button id="addAdmin" type="type" name="btnAdd" class="btnadd btn" style="background-color: blue; color:white;">Add</button>
                  </div>
                  
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table id="basic-datatables" class="display table table-striped table-bordered" >
            <thead>
               <tr>
                  <th class="text-center">#ID</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Permission</th>
                  <th class="text-center">View gallery / Delete</th>
               </tr>
            </thead>
            <tbody>
            <?php
               require_once('../db.php');
               $sql = "SELECT * FROM users";
               $result = mysqli_query($conn, $sql);
               $resultCheck = mysqli_num_rows($result); ?>
               <?php while($row = mysqli_fetch_assoc($result)) { ?>
                  <?php 
                     $role = "Admin";
                     if($row['permission'] == 2) {
                        $role = "User";
                     }
                  ?>
                     <tr>
                        <td class="text-center"><?= $row['id'] ?></td>
                        <td class="text-center"><?= $row['name'] ?></td>
                        <td class="text-center"><?= $row['email'] ?></td>
                        <td class="text-center">
                           <span class="badge" style="background-color: blue"><?=$role?></span>
                        </td>
                        <td class="text-center">
                           <a href="index-admin.php?quanly=user&nameview=<?= $row['name'] ?>" class="btn btn-info btn-sm"> 
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <circle cx="12" cy="12" r="2" />
                                 <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                              </svg>
                           </a>
                           <a href="index-admin.php?quanly=user&name=<?= $row['name'] ?>" action="delete-user.php" data-id="" id="deleteUpload" class="btn btn-danger btn-sm delete-data">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <line x1="4" y1="7" x2="20" y2="7" />
                                 <line x1="10" y1="11" x2="10" y2="17" />
                                 <line x1="14" y1="11" x2="14" y2="17" />
                                 <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                 <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                              </svg>
                           </a>
                        </td>
                     </tr>
               <?php }
               ?>         
            </tbody>
         </table>
      </div>
   </div>
   
   <!-- <div class="modal fade" id="confimartionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confimartionModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered rounded-0">
         <div class="modal-content rounded-0">
            <form action="" method="post">
               <div class="modal-header py-1" style="text-align: center;">
                  <h5 class="modal-title" style="text-align: center; margin:auto;" id="confimartionModalLabel"></h5>
                  <button type="button" style="text-align: center;" style="font-size: .65em;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body rounded-0" style="text-align: center; font-size:18px;"></div>
               <div class="modal-footer py-1 rounded-0" style="margin-top: -12px;">
                  <button type="submit" style="background-color: blue; margin:auto; font-size:20px; color: white;" class="btn btn-sm rounded-0 confirm-btn" name="btnDelete">Yes, Delete It</button>
                  <button type="submit" style="background-color: gray; margin:auto; font-size:20px; color: white;" class="btn btn-sm rounded-0" data-bs-dismiss="modal" name="btnClose">Close</button>
            
               </div>
            </form>
         </div>
      </div>
   </div> -->
</div>

