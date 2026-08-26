
<?php
include ('dbconnection.php');
session_start();
// if($_SESSION['is_login']){
//  $rEmail = $_SESSION['rEmail'];
// } else {
//  echo "<script> location.href='login.php'; </script>";
// }
if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestinfo'];
   $rdesc = $_REQUEST['requestdesc'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['requesteradd1'];
   $radd2 = $_REQUEST['requesteradd2'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['requestdate'];
   $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
   if($conn->query($sql) == TRUE){
    // below msg display on form submit success
    $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully  </div>';
    
    $_SESSION['myid'] = $genid;
    echo "";
    // include('submitrequestsuccess.php');
   } else {
    // below msg display on form submit failed
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}

?>


 
    <?php include ('usernav.php');
    ?>
       <div class="content-wrapper">
          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Book your Services </h4>
                    <p class="card-description">.</p>
                    <form class="forms-sample" method="post">
                    <div class="form-group">
                        <label for="exampleSelectGender">Services</label>
                        <select class="form-select" id="inputRequestInfo" name="requestinfo">
                          <option>Cleaning Services</option>
                          <option>Plumbing and Heating Services</option>
                          <option>Electrical Services</option>
                          <option>Pest Control Services</option>
                          <option>Home Security Services</option>
                          <option>Home Maintenance Services</option>
                          <option>Appliance Repair Services</option>
                          <option>Home Energy Services</option>
                          <option>Others</option>
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc" rows="3"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputName" placeholder="Eg. Rahul Sharma" name="requestername"/>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Eg. abc@gmail.com" name="requesteremail" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputMobile" name="requestermobile"  onkeypress="isInputNumber(event)"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 1</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputAddress" placeholder="Eg.  House No. 123" name="requesteradd1" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputState" name="requesterstate" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address 2</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputAddress2" placeholder=" Eg.  Railway Colony" name="requesteradd2"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postcode</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputZip" name="requesterzip" onkeypress="isInputNumber(event)" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputCity" name="requestercity" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input type="Date" class="form-control" id="inputDate" name="requestdate" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-inverse-primary me-2" name="submitrequest">Submit</button>
                      <button class="btn btn-inverse-danger">Cancel</button>
                      <?php if(isset($msg)) {echo $msg; } ?>
                    </form>
                  </div>
                </div>
              </div>
          </div>
    </div>

<!-- For Num input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
   
  
<?php
 
$conn->close();
?>