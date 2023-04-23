<header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top: -5px;" >
        <div class="container-fluid ">
            <a class="navbar-brand" href="#" >
            <img src="../source/images/Storage.png" width="110" height="32" alt="" class="navbar-brand-image" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 25 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                </svg> 
                            </span>                    
                            <span class="nav-link-title" onclick="tai_lai_trang()" href="#">Home</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="../source/error/500.error.php" class="nav-link active">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="nav-link-title" href="#">Price</span>
                        </a>
                        
                    </li>
                    <li class="nav-item active">
                        <a href="../source/error/500.error.php" class="nav-link active"> 
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                            </svg>
                            <span class="nav-link-title" href="#">Help</span>
                        </a>
                        
                    </li>
                    <li class="nav-item active">
                        <a href="../source/error/500.error.php" class="nav-link active">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"></path>
                                </svg>    
                            <span class="nav-link-title" href="#">Contract</span>
                        </a>
                        
                    </li>   
                    <li class="nav-item active" id="lilogin">
                        <a href="user/Login.php" class="btn btn-outline-info btn-lg p-2 m-0 border-dark" id="btnlogin">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="22" viewBox="0 0 22 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                            </svg>
                            Sign in
                            </a>
                    </li>
                    <li class="nav-item" id="licreate-account">
                        <a href="user/register.php" class="btn btn-outline-info btn-lg p-2 m-0 border-dark" id="btnsignup">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 11h6m-3 -3v6"></path>
                                </svg>    
                                Create account                     
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>