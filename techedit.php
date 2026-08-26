<?php
$_SESSION['is_adminlogin'] = true;


include('dbconnection.php');
include('adminnav.php');


if(isset($_REQUEST['empsubmit'])){
  // Checking for Empty Fields
  if(($_REQUEST['emp_id'] == "") 
  || ($_REQUEST['empName'] == "") 
  || ($_REQUEST['empCity'] == "") 
  || ($_REQUEST['empMobile'] == "")
  || ($_REQUEST['empEmail'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $emp_id = $_REQUEST['emp_id'];
    $empName = $_REQUEST['empName'];
    $empCity = $_REQUEST['empCity'];
    $empMobile = $_REQUEST['empMobile'];
    $empEmail = $_REQUEST['empEmail'];

  $sql = "UPDATE technician_tb SET emp_id = '$emp_id', empName = '$empName', empCity = '$empCity',
  empMobile = '$empMobile', empEmail = '$empEmail' WHERE  emp_id = '$emp_id'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
  }
 ?>
<div class="content-wrapper">
          
          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Profile</h4>
                <p class="card-description"> Update Information </p>
                <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM technician_tb WHERE emp_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="emp_id">Technician ID(*Cannot Change)</label>
      <input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php if(isset($row['emp_id'])) 
      {echo $row['emp_id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="empName"> Name</label>
      <input type="text" class="form-control" id="empName" 
      name="empName" value="<?php if(isset($row['empName'])) {echo $row['empName']; }?>">
    </div>
    <div class="form-group">
      <label for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" 
      name="empCity" value="<?php if(isset($row['empCity'])) {echo $row['empCity']; }?>">
    </div>
    <div class="form-group">
      <label for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" 
      name="empMobile" value="<?php if(isset($row['empMobile'])) {echo $row['empMobile']; }?>">
    </div>
    <div class="form-group">
      <label for="empEmail">Email</label>
      <input type="text" class="form-control" id="empEmail" name="empEmail" value="
      <?php if(isset($row['empEmail'])) {echo $row['empEmail']; }?>">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-inverse-success" id="empsubmit" name="empsubmit">Update</button>
      <a href="technician.php" class="btn btn-inverse-danger">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>

              </div>
            </div></div></div></div>