<?php
   if(isset($_GET['name'])) {
      $tam = $_GET['name'];  
      require_once('../db.php');
      $sql1 = "SELECT * FROM uploads where id = '$tam'";
      $result = mysqli_query($conn, $sql1);
      $resultCheck = mysqli_num_rows($result);
      error_reporting(0);
      $row = mysqli_fetch_assoc($result); 
      if($tam==  trim($row['id']))  {
         if(unlink('../user/uploads/'.trim($row['main_filename']))) {
            require_once("../db.php");
            $sql = "DELETE FROM  `uploads` WHERE id = '$tam'";
            mysqli_query($conn,$sql);
         }
      }
   }
  
?> 

<link rel="stylesheet" href="../css/style3.css">  
<link rel="stylesheet" href="../css/style1.css">  
<div class="card mb-2 d-block d-md-none">
    <div class="card-body">
        <form action="" method="GET">
            <div class="input-icon">
               <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <circle cx="10" cy="10" r="7"></circle>
                     <line x1="21" y1="21" x2="15" y2="15"></line>
                  </svg>
               </span>
               <input type="text" name="q" class="form-control" placeholder="Search on uploads...">
            </div>
        </form>
    </div>
</div>
<div class="card">
   <div class="card-header">
      <h2 class="m-0">All uploads</h2>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="display table table-striped table-bordered" >
            <thead>
               <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">User Name</th></th>
                  <th class="text-center">Name File</th>
                  <th class="text-center">File type</th>
                  <th class="text-center">File size</th>
                  <th class="text-center">Create At</th>
                  <th class="text-center">View / Delete</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  require_once('../db.php');
                  $sql = "SELECT * FROM uploads";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result); ?>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr class="file-table">
                        <td class="text-center"><?= $row['id'] ?></td>
                        <?php
                           require_once("../usercontroller.php");
                           $user = (new UserController())->checkID($row['user_id']);
                           if(trim($user->id) == $row['user_id']) {  ?>
                              <td class="text-center"><?= $user->name ?></td>
                           <?php } else {
                              $a = trim($row['user_id']);
                              $sql1 = "SELECT * FROM uploads where user_id = '$a'";
                              $result = mysqli_query($conn, $sql1);

                              $resultCheck = mysqli_num_rows($result);
                              // echo $resultCheck;
                              // error_reporting(0);
                              while($row1 = mysqli_fetch_assoc($result)) {
                                 // echo $row1['id'];
                                 // echo $row1['id'];
                                 if($a==  trim($row1['user_id']))  {
                                    // echo $row1['id'];
                                    // echo $a;
                                    if(unlink('../user/uploads/'.trim($row1['main_filename']))) {
                                       require_once("../db.php");
                                       $sql3 = "DELETE FROM  `uploads` WHERE user_id = '$a'";
                                       mysqli_query($conn,$sql3);
                                        
                                       
                                    }
                                 }
                              } 
                           }
                        ?>
                        <td class="text-center"><?= $row['main_filename'] ?></td>
                        <td class="text-center">
                           <?php 
                              include("../db.php");
                              $type = '{
                                 "jpg": "../images/jpg.png", 
                                 "jpeg": "../images/jpeg.png", 
                                 "png": "../images/png.png", 
                                 "docx":"../images/docx.png", 
                                 "apk": "../images/apk.png", 
                                 "csv": "../images/csv.png", 
                                 "doc": "../images/doc.png", 
                                 "gif": "../images/gif.png", 
                                 "mp3": ".../images/mp3.png", 
                                 "mp4": "../images/mp4.png", 
                                 "pdf": "../images/pdf.png", 
                                 "zip": "../images/zip.png", 
                                 "xlsx": "../images/xlsx.png"
                              }';
                              $obj = json_decode($type);
                              foreach($obj as $key => $value) { 
                                 if(trim($row['file_type']) == $key) {  ?> 
                                    <img src=<?php echo $value ?> alt="" width="40" height="40">
                              <?php   }
                              }
                           ?>
                          
                        </td>
                        <td class="text-center"><?= $row['file_size'] ?></td>
                        <td class="text-center"><?= $row['created_at'] ?></td>
                        <td class="text-center">
                           <a href="index-admin.php?quanly=upload&nameview=<?= $row['id']?>" class="btn btn-info btn-sm">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <circle cx="12" cy="12" r="2" />
                                 <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                              </svg>
                           </a>
                           <a href="index-admin.php?quanly=upload&name=<?= $row['id']?>" data-id="" id="deleteUpload" class="btn btn-danger btn-sm">
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
</div>


