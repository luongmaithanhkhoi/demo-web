<link rel="stylesheet" href="../css/style3.css">  
<link rel="stylesheet" href="../css/style1.css">  
<div class="filebob_dash mt-3">
   <form action="" method="">
      <div class="input-icon mb-3">
         <input type="text" class="form-control" name="q" placeholder="Search…">
         <span class="input-icon-addon">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
         </span>
       </div>
   </form>
   <div class="content">
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
            $id = $_SESSION['userid'];
            $sql = "SELECT file_type, main_filename, file_size FROM uploads where user_id = '$id'";
            $res = mysqli_query($conn,  $sql);
            $return= '';
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
                           <a href="<?php echo 'uploads/'.$row['main_filename']?>" class="file-download">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                 <polyline points="7 11 12 16 17 11" />
                                 <line x1="12" y1="4" x2="12" y2="16" />
                              </svg>
                           </a>
                           <div class="file-man-title">
                              <h5 class="mb-0 text-overflow"><?php echo $row['main_filename'] ?></h5>
                              <p class="mb-0"><small><?php echo $row['file_size'] ?></small></p>
                           </div>
                        </div>  
                     </div>  
            <?php }
               }  
            }    
         ?>
      </div>
   </div>
   
   <div class="empty">
      <?php if (isset($_GET['error'])): ?>
			<p style="color:red; font-size:30px" ><?php echo $_GET['error']; ?></p>
		<?php endif ?>
  </div>  
</div>
