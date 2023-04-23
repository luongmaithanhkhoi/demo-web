<?php
    if (!isset($_SESSION['username'])) {
        header('Location: ../user/Login.php');
        exit();
    }
 
?>
<?php
   require_once('../db.php');

?>
<link rel="stylesheet" href="../css/style1.css">
<div class="ad__dashboard">
   <div class="note note-primary">
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="card mb-3 bg-success text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                  <polyline points="9 15 12 12 15 15" />
                  <line x1="12" y1="12" x2="12" y2="21" />
               </svg>
               <?php
                  require_once('../db.php');
                  $dash_post_query = "SELECT * from uploads";
                  $dash_post_query_run = mysqli_query($conn, $dash_post_query);
                  if($post_total = mysqli_num_rows($dash_post_query_run)) {
                     echo '<h1>'.$post_total.'</h1>';
                  }
                  else {
                     echo '<h1> 0 </h1>';
                  }
               ?>
               Total Uploads
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card mb-3 bg-blue text-white border-0">
            <div class="card-body text-center">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="9" cy="7" r="4" />
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
               </svg>
               <?php
                  require_once('../db.php');
                  $dash_post_query = "SELECT * from users";
                  $dash_post_query_run = mysqli_query($conn, $dash_post_query);
                  if($post_total = mysqli_num_rows($dash_post_query_run)) {
                     echo '<h1>'.$post_total.'</h1>';
                  }
                  else {
                     echo '<h1> 0 </h1>';
                  }
               ?>
               Total Users
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-header">
         <h3 class="m-0">Statistics of uploads</h3>
         <span class="col-auto ms-auto d-print-none">
         <a href="index-admin.php?quanly=user" class="btn btn-sm">View uploads</a>
         </span>
      </div>
      <div class="card-body">
         
         <div id="chart-uploads-overview"></div>
      </div>
   </div>
</div>
