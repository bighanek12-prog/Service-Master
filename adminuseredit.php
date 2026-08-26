<?php
$_SESSION['is_adminlogin'] = true;


include('dbconnection.php');
include('adminnav.php');


if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['id'] == "") || ($_REQUEST['firstName'] == "") || ($_REQUEST['lastName'] == "") || ($_REQUEST['email'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    $rid = $_REQUEST['id'];
    $fname = $_REQUEST['firstName'];
    $lname = $_REQUEST['lastName'];
    $remail = $_REQUEST['email'];

  $sql = "UPDATE users SET id = '$rid', firstName = '$fname', 
  lastName = '$lname', email = '$remail' WHERE  id = '$rid'";
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
                <h4 class="card-title text-primary">User Profile</h4>
                <p class="card-description"> Update Information </p>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM users WHERE id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="id">Requester ID(Cannot Change)</label>
      <input type="text" class="form-control" id="id" name="id" value="<?php if(isset($row['id'])) 
      {echo $row['id']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" id="Firstname" 
      name="firstName" value="<?php if(isset($row['firstName'])) {echo $row['firstName']; }?>">
    </div>
    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" id="lastName" 
      name="lastName" value="<?php if(isset($row['lastName'])) {echo $row['lastName']; }?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="
      <?php if(isset($row['email'])) {echo $row['email']; }?>">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-inverse-success" id="requpdate" name="requpdate">Update</button>
      <a href="requesterad.php" class="btn btn-inverse-danger">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>

              </div>
            </div></div></div></div>