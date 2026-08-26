<?php
include('dbconnection.php');

$email=$err_msg ="";

 if(isset($_POST['signIn'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=md5($password) ;
  
  $sql="SELECT * FROM users WHERE email='$email' and password='$password'";

  $result=$conn->query($sql);
  if($result->num_rows>0){
    echo '<script>
    alert("user found ###")
    </script>';            

    $row=$result->fetch_assoc();
  //  $_SESSION['fName']=$row['fName'];
  session_start(); 
   $_SESSION['email']=$row['email'];
   header("location: index.php");

  //  exit();
  }
  else{
    echo "Not Found, Incorrect Email or Password";
  }
 

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Service Master</title>
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
 

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="navbar default-layout-navbar mb-3 ">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <a class="navbar-brand" href="index.php"><b>Service Master</b></a>
    </div>
                </div>
                

                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form name="form" method="post" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg"  name="email" id="email" placeholder="Email" value="<?=$email?>" required >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Sign In" name="signIn">SIGN IN</button>
                  </div>
                  
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
  </body>
</html>