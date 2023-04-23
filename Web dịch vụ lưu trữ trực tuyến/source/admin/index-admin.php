<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../user/Login.php');
        exit();
    }
?>
<?php
   require_once('../db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hello Admin</title>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="../css/style1.css">
   <link rel="stylesheet" href="../js/confir.js">
   <style>
      * {
         font-family: sans-serif;
      }
   </style>
</head>
<body class="antialiased">  
   <div class="page">
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark" id="aside" style=" background-color: #206bc4;">
         <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
               <a href="#">
                  <img src="../images/Storage.png" width="110" height="32" alt="" class="navbar-brand-image">
               </a>
            </h1>
            <div class="navbar-nav flex-row d-lg-none">
               <div class="nav-item dropdown">
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                     <a href="index-admin.php" class="dropdown-item">Dashboard</a>
                     <a href="index-admin.php?quanly=profile" class="dropdown-item">Update profile<</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="../user/logout.php">Logout</a>
                  </div>
               </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
               <ul class="navbar-nav pt-lg-3">
                  <li class="nav-item">
                        <a class="nav-link" href="index-admin.php" name="dashboard" >
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                 <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                 <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                              </svg>
                           </span>
                           <span class="nav-link-title">
                           Dashboard
                           </span>
                        </a>
                  
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index-admin.php?quanly=user">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <circle cx="9" cy="7" r="4" />
                              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        Manage users
                        </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index-admin.php?quanly=upload" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                              <polyline points="9 15 12 12 15 15" />
                              <line x1="12" y1="12" x2="12" y2="21" />
                           </svg>
                        </span>
                        <span class="nav-link-title">
                        Manage uploads
                        </span>
                     </a>
                  </li>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="index-admin.php?quanly=profile" >
                     <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                           <circle cx="12" cy="12" r="3" />
                        </svg>
                     </span>
                     <span class="nav-link-title">
                     Admin profile
                     </span>
                  </a>
                  </li>
               </ul>
            </div>
         </div>
      </aside>
      <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
         <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav flex-row order-md-last">
               <div class="nav-item d-none d-md-flex me-3">
                  <a href="../error/503.error.php" class="nav-link px-0">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                        <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                     </svg>
                     <span class="badge bg-red faa-flash animated"></span>
                    
                  </a>
               </div>
               <div class="nav-item dropdown">
                  <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                     <span class="avatar avatar-sm" style="background-image: url(../images/default.png);"></span>
                     <div class="d-none d-xl-block ps-2">
                        <div>Admin</div>
                        <div class="mt-1 small text-muted">
                        <?php
                           print_r($_SESSION['username']);
                        ?>
                        </div>
                     </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                     <a href="index-admin.php" class="dropdown-item">Dashboard</a>
                     <a href="index-admin.php?quanly=profile" class="dropdown-item">Update profile</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="../user/logout.php" >Logout</a>
                     
                  </div>
               </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
               <div class="ms-md-auto py-2 py-md-0 me-md-4 order-first order-md-last flex-grow-1">
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
         </div>
      </header>
      <div class="content">
         <div class="container-xl">
            <?php
               if(isset($_GET['quanly'])) {
                  $tam = $_GET['quanly'];  
               } else {
                  $tam = '';
                  include("dashboard.php");
               }
               if ($tam=='user') {
                  
                  if(isset($_GET['nameview'])) {
                     if ($tam = $_GET['nameview']) {
                        include("view-user.php");
                     }
                  } else {
                     include("manageuser.php");
                  }
               }
               if ($tam=='upload') {
                  if(isset($_GET['nameview'])) {
                     if ($tam = $_GET['nameview']) {   
                        include("view-uploads.php");
                     }
                  } else {
                     error_reporting(0);
                     header("refresh: 1");
                     include("manage_upload.php");
                  }
                  // include("manage_upload.php");
               }
               if ($tam =='profile') {
                  include("admin-profile.php");
               }
               
            ?>
         
         </div>
      </div>
   </div>
   <script src="../js/confir.js"></script>             
</body>