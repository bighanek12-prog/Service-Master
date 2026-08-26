<?php
    include('adminnav.php');
    include('dbconnection.php');
    
    // include('sessionadmin.php');

 if(isset($_SESSION['is_adminlogin'])){
  // $ausername = $_SESSION['user_id'];
  // echo 'if';
 } else {
  echo 'else';
  
 }
 if(isset($_REQUEST['reqsubmit'])){
    // Checking for Empty Fields
    if(($_REQUEST['firstName'] == "") || ($_REQUEST['lastName'] == "")|| ($_REQUEST['email'] == "")
     || ($_REQUEST['password'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $firstName = $_REQUEST['firstName'];
      $lastName = $_REQUEST['lastName'];
      $rEmail = $_REQUEST['email'];
      $rPassword = $_REQUEST['password'];
      $sql = "INSERT INTO users (firstName, lastName ,email, password) 
      VALUES ('$firstName','$lastName', '$rEmail', '$rPassword')";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
      }
    }
    }
   ?>
   <div class="col-sm-6 mt-5  mx-3 jumbotron">
     <h3 class="text-center bg-light text-primary">Add New Requester</h3>
     <form action="" method="POST">
       <div class="form-group">
         <label for="firstName">Name</label>
         <input type="text" class="form-control" id="firstName" name="firstName">
       </div>
       <div class="form-group">
         <label for="lastName">Name</label>
         <input type="text" class="form-control" id="lastName" name="lastName">
       </div>
       <div class="form-group">
         <label for="email">Email</label>
         <input type="email" class="form-control" id="email" name="email">
       </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" class="form-control" id="password" name="password">
       </div>
       <div class="text-center">
         <button type="submit" class="btn btn-inverse-success" id="reqsubmit" name="reqsubmit">Submit</button>
         <a href="requesterad.php" class="btn btn-inverse-danger">Close</a>
       </div>
       <?php if(isset($msg)) {echo $msg; } ?>
     </form>
   </div>
   