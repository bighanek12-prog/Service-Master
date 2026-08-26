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
 if(isset($_REQUEST['empsubmit'])){
    // Checking for Empty Fields
    if(($_REQUEST['empName'] == "") 
    || ($_REQUEST['empCity'] == "")
    || ($_REQUEST['empMobile'] == "") || 
    ($_REQUEST['empEmail'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $eName = $_REQUEST['empName'];
      $eCity = $_REQUEST['empCity'];
      $eMobile = $_REQUEST['empMobile'];
      $eEmail = $_REQUEST['empEmail'];
      $sql = "INSERT INTO technician_tb (empName, empCity, empMobile ,empEmail)
               VALUES ('$eName', '$eCity', '$eMobile' , '$eEmail')";
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
     <h3 class="text-center bg-light text-primary">Add New Technician</h3>
     <form action="" method="POST">
       <div class="form-group">
         <label for="empName">Name</label>
         <input type="text" class="form-control" id="empName" name="empName">
       </div>
       <div class="form-group">
         <label for="empCity">City</label>
         <input type="text" class="form-control" id="empCity" name="empCity">
       </div>
       <div class="form-group">
         <label for="empMobile">Mobile</label>
         <input type="text" class="form-control" id="empMobile" name="empMobile">
       </div>
       <div class="form-group">
         <label for="empEmail">Email</label>
         <input type="email" class="form-control" id="empEmail" name="empEmail">
       </div>
       <div class="text-center">
         <button type="submit" class="btn btn-inverse-success" id="empsubmit" name="empsubmit">Submit</button>
         <a href="technician.php" class="btn btn-inverse-danger">Close</a>
       </div>
       <?php if(isset($msg)) {echo $msg; } ?>
     </form>
   </div>
   