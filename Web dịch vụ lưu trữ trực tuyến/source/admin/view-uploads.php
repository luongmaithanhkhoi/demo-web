<link rel="stylesheet" href="../css/style3.css">  
<div class="admin__settings">
    <div class="card mb-3">
        <div class="card-body text-center">
            <div class="rounded-circle avatar avatar-xl mb-2">
                <img class="rounded-circle" id="preview_avatar" src="../images/default.png" width="100" height="100">
            </div>
            <h2>
                <?php
                    if(isset($_GET['nameview'])) {
                        $tam = $_GET['nameview'];  // id san pham
                        
                    }
                    // print_r($tam);
                    require_once("../db.php");
                    require_once("../usercontroller.php");
                    require_once("../uploadcontroller.php");
                    $file = (new UploadController())->check($tam);
                    $user = (new UserController())->checkID($file->user_id);
                    print_r($user->name);
                    
                ?>
            </h2>
            <p class="text-muted"><?php echo $user->email ?></p>
        </div>
    </div>
    <div class="note note-danger print-error-msg" style="display:none"><span></span></div>
    <div class="card-body">
      <div class="table-responsive">
         <table class="display table table-striped table-bordered" >
            <thead>
               <tr>
                  <!-- <th class="text-center">ID</th> -->
                  <th class="text-center">User Name</th></th>
                  <th class="text-center">Name File</th>
                  <th class="text-center">File type</th>
                  <th class="text-center">File size</th>
                  <th class="text-center">Create At</th>
                  <th class="text-center">Upload At</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  require_once('../db.php');
                  $sql = "SELECT * FROM uploads where id = '$tam'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result); ?>
                  <?php while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr class="file-table">
                        <!-- <td class="text-center"><?= $row['id'] ?></td> -->
                        <?php
                           require_once("../usercontroller.php");
                           $user = (new UserController())->checkID($row['user_id']);
                           if($user->id == $row['user_id']) {  ?>
                              <td class="text-center"><?= $user->name ?></td>
                           <?php }
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
                        <td class="text-center"><?= $row['updated_at'] ?></td>
                     </tr>
                     
              
               <?php }
               
               ?>
               
            </tbody>
            
            
        </table>           
      </div>
   </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <a style="background-color:white; border-color: white; margin:;" href="index-admin.php?quanly=upload" class="btn btn-info btn-sm" > 
                    <button  type="submit" id="saveAdminInfoBtn" class="btninfo btn" style="background-color: blue;  color:white;">Return</button>
                </a>
            </div>
        </div>
    </div>
</div>
