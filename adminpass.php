<?php
include('adminnav.php');
include ('dbconnection.php');

if(isset($_SESSION['is_adminlogin'])){
 
 } else {
  echo "<script> location.href='adminpage.php'; </script>";
 }
 
 if(isset($_REQUEST['passupdate'])){
  if(($_REQUEST['aPassword'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
     
     $aPass = $_REQUEST['aPassword'];
     $sql = "UPDATE adminlogin_tb SET a_password = '$aPass' ";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    
   }
}
?>
<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5">
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password" name="aPassword">
        </div>
        <button type="submit" class="btn btn-inverse-danger mr-4 mt-4" name="passupdate">Update</button>
        <a href="dashboard.php" class="btn btn-inverse-secondary mt-4">Close</a>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
      </form>
    </div>
  </div>
</div>
</div>
</div>