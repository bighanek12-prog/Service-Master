<?php include_once('session.php') ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <title>Service Master</title>

</head>
<body>
  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row fixed-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand" href="index.php"><b>Service Master</b></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
   
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
             <div class="nav-profile-img">
            </div>

            <!-- kunal's new  code starts  -->
            <div class="nav-profile-text">
              <p class="mdi mdi-account ">
              <?php 
              if (isset($_SESSION['email']))
              {
                echo $_SESSION['email'];
              }
              else{
                echo 'Login';
              }?></p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <?php 
              if (isset($_SESSION['email']))
              {
                echo'
                <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-account-off me-2 text-primary"></i> Signout </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Request.php">
                <i class="mdi mdi-login me-2 text-success"></i> Request </a> 
                <div class="dropdown-divider"></div>  
                <a class="dropdown-item" href="User.php">                
                <i class="mdi mdi-update me-2 text-primary"></i> Update Profile </a>';
              }
              else{
                echo'<a class="dropdown-item" href="login.php">
                <i class="mdi mdi-account me-2 text-primary"></i> Singin</a>
                <div class="dropdown-divider"></div>';
              }?>            
          </div> 
        </li>


        <!-- user name in navbar code ends -->
        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="mdi mdi-home menu-icon"></i>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="index.php">
              <i class="mdi mdi-home me-2 text-primary"></i> Home </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="service.php">
              <i class="mdi mdi-cogs me-2 text-primary"></i> Services </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="contact.php">
              <i class="mdi mdi-email me-2 text-primary"></i> Contact Us </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="login.php">
              <i class="mdi mdi-account me-2 text-primary"></i> Login</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="about.php">
              <i class="mdi mdi-information me-2 text-primary"></i> About Us</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="adminpage.php">
              <i class="mdi mdi-account-key me-2 text-primary"></i> Admin Login</a>
          </div> 
        </li>  
        
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
        
        
      </ul>

          </div>
  </nav>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->

</body>
</html>