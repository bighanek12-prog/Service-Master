<?php
  include('usernav.php');
  include('dbconnection.php');
 


if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['firstName'] == "") || ($_REQUEST['lastName'] == "")  || ($_REQUEST['email'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    // Assigning User Values to Variable
    
    $fname = $_REQUEST['firstName'];
    $lname = $_REQUEST['lastName'];
    $remail = $_REQUEST['email'];

  $sql = "UPDATE users SET  firstName = '$fname', 
  lastName = '$lname', email = '$remail' WHERE  firstName = '$fname'";
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
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if(isset($row['email'])) {echo htmlspecialchars($row['email']); }?>" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php if(isset($row['firstName'])) {echo htmlspecialchars($row['firstName']); }?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php if(isset($row['lastName'])) {echo htmlspecialchars($row['lastName']); }?>" required>
                        </div>
           <div class="form-group"> 
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($row['password'])) {echo htmlspecialchars($row['password']); }?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-inverse-success" id="requpdate" name="requpdate">Update</button>
                            <a href="index.php" class="btn btn-inverse-danger">Close</a>
                        </div>
                        <?php if(isset($msg)) {echo $msg; } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>