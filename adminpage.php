<?php
include('dbconnection.php');
if(isset($_POST['adminlogin'])){
    if(isset($_REQUEST['user_id'])){
      $ausername = mysqli_real_escape_string($conn,trim($_REQUEST['user_id']));
      $apassword = mysqli_real_escape_string($conn,trim($_REQUEST['apassword']));
      $sql = "SELECT a_name, a_password FROM adminlogin_tb WHERE a_name='".$ausername."' AND a_password='".$apassword."' limit 1";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        session_start();      
        $_SESSION['is_adminlogin'] = true;
        $_SESSION['user_id'] = $ausername;
        
        echo "<script> location.href='dashboard.php'; </script>";
        $msg = "";
        exit;
      } else {
        $msg = '<div class="alert alert-info mt-2" role="alert"> Enter Valid UserID and Password </div>';
      }
    }
  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Admin Login</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

  <!-- Custom styles for this template -->
  <link href="css/lg.css" rel="stylesheet" />

</head>
<script>
    if(window.history.replaceState){
    window.history.replaceState(null,null, window.location.href);
}
</script>

<body>
 
<div class="container">

      <!--Data or Content-->
      <div class="box-1">
          <div class="content-holder">
              <h2>Hello ! ! !</h2>
          </div>
      </div>
      <!--Forms-->
      <form name="form" action="" method="post" required>
      <div class="form box-2">
          <div class="login-form-container">
              <h1>Admin Login </h1>
              <input id="user_id" name="user_id" type="text" placeholder="UserID" class="input-field">
              <br><br>
              <input id="apassword" name="apassword" type="password" placeholder="Password" class="input-field">
              <br><br>
              <button type="submit" name="adminlogin" class="login-button" type="button">Login</button>
          </div>
      </div>  <a href="index.php" style="text-decoration:none;">Back to home</a>    
      </form>
      <?php if(isset($msg)) {echo $msg; } ?>
     
							
      
    </body>
</html>