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
                        if ($tam = $_GET['nameview']) {
                            print_r($tam);
                        }
                    }
                    require_once("../db.php");
                    require_once("../usercontroller.php");
                    $user = (new UserController())->check($tam);
                ?>
            </h2>
            <p class="text-muted"><?php echo $user->email ?></p>
        </div>
    </div>
    <div class="note note-danger print-error-msg" style="display:none"><span></span></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">File information</div>
                    <div class="row">
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
                        $id = $user->id;
                        $sql = "SELECT file_type, main_filename, file_size FROM uploads where user_id = '$id'";
                        $res = mysqli_query($conn,  $sql);
                        $return= $res;
                        // print_r(mysqli_num_rows($return));
                        if(mysqli_num_rows($return)==0) { ?>
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4 style="text-align:center;">No file uploads</h4>    
                                    </div>
                                    <a style="background-color:white; border-color: white;" href="index-admin.php?quanly=user" class="btn btn-info btn-sm"> 
                                        <button  type="submit" id="saveAdminInfoBtn" class="btninfo btn" style="background-color: blue;  color:white;">Return</button>
                                    </a>
                                </div>
                            </div>
                            <?php     } else {
                            while($row = mysqli_fetch_assoc($res)) { 
                                foreach($obj as $key => $value) { 
                                    if($key == trim($row['file_type'])) {    ?>
                                        <div class="col-lg-3 col-xl-2"> 
                                            <div class="file-man-box">
                                                <a href="#" id="deleteFile" data-id="" class="file-close"><i class="fa fa-times-circle"></i></a>
                                                <a href="#" target="_blank"  class="file-view"><i class="fa fa-link"></i></a>
                                                <div class="file-img-box">
                                                    <img src=<?php echo $value ?> alt="icon">
                                                </div>
                                                <div class="file-man-title">
                                                    <h5 class="mb-0 text-overflow"><?php echo $row['main_filename'] ?></h5>
                                                    <p class="mb-0"><small><?php echo $row['file_size'] ?></small></p>
                                                </div>
                                                
                                            </div>  
                                        </div>  
                                <?php }
                                }  
                            }  ?>
                            <a style="background-color:white; border-color: white;" href="index-admin.php?quanly=user" class="btn btn-info btn-sm"> 
                                <button  type="submit" id="saveAdminInfoBtn" class="btninfo btn" style="background-color: blue;  color:white;">Return</button>
                            </a>   
                            <?php   }
                        
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
