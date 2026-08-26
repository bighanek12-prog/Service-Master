<?php
session_start();

include('dbconnection.php');

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $checkEmail="SELECT * From users where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
        session_destroy();
     }
     else{
        $insertQuery="insert into users(firstName,lastName,email,password)
                       VALUES ('$firstName','$lastName','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
              echo '<script>
              alert("Account created Success.")
              </script>';
            }
            else{
                echo "Error:".$conn->error;
            }
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
    <!-- plugins:css -->
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
  <style> button{
    color:rgb(125,125,235);
    border:none;
    background-color:transparent;
    font-size:1rem;
    font-weight:bold;
}
button:hover{
    text-decoration:underline;
    color:blue;
}
</style>
</head>
  <body>
    <div class="container-scroller" >
      <div class="container-fluid page-body-wrapper full-page-wrapper" >
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
               <div class="navbar default-layout-navbar mb-3 ">
               <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand" href="index.php"><b>Service Master</b></a>
               </div>
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form name="form" method="post" class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="fName" id="fName" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="lName" id="lName" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required>
                  </div>
                                    <div class="mt-3 d-grid gap-2">
                  
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="Sign Up" name="signUp" >SIGN UP </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
    <!-- endinject -->
  </body>
</html>