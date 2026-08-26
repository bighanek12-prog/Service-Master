
<?php
    
    include('dbconnection.php');
    
    include('sessionadmin.php');

 if(isset($_SESSION['is_adminlogin'])){
  $ausername = $_SESSION['user_id'];
 } else {
  echo "<script> location.href='adminpage.php'; </script>";
 }
 $sql = "SELECT max(request_id) FROM submitrequest_tb";
 $result =$conn->query($sql);
 $row = $result->fetch_row();
 $submitrequest = $row[0]; 

 $sql = "SELECT max(request_id) FROM assignwork_tb";
 $result =$conn->query($sql);
 $row = $result->fetch_row();
 $assignwork = $row[0]; 

 $sql = "SELECT * FROM technician_tb";
 $result =$conn->query($sql);
$totaltech=$result->num_rows; 
    ?>
    
    <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin</title>
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
    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
  </head>
  <body> 
    <?php include ('adminnav.php');
    ?>
   
    
  

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <!-- <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> -->
                    <h4 class="font-weight-normal mb-3">Request Rcieved<i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?php 
                    echo $submitrequest; ?></h2>
                    <a class=" btn card-text text-white" href="Approverequest.php">View</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Assigned Work <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">
                    <?php echo $assignwork; ?>
                    </h2>
                    <a class=" btn card-text text-white"href="Workorder.php">View</a>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">No. of Technician <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"><?php echo $totaltech; ?></h2>
                    <a class=" btn card-text text-white"href="technician.php">View</a>
                  </div>
                </div>
              </div>
            </div>
            
            </div> 
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List of Requesters</h4>
                   
                    <div class="table-responsive">
              <?php
                    include ('dbconnection.php');
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);
                     if($result->num_rows > 0){
                        echo '<table class="table">
                        <thead>
                        <tr>
                        <th scope="col">FirstName</th>
                       <th scope="col">LastName</th>
                        <th scope="col">Email</th>
                      <th scope="col">Requester ID</th>
                      </tr>
                      </thead>
                      <tbody>';
                    while($row = $result->fetch_assoc()){
                      echo '<tr>';
                      echo '<td>'. $row["firstName"].'</td>';
                      echo '<td>'. $row["lastName"].'</td>';
                      echo '<td>'.$row["email"].'</td>';
                      echo '<th scope="row">'.$row["id"].'</th>';
                   }
                      echo '</tbody> 
                       </table>';
                  } else {
                         echo "0 Result";
                          }

              ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  
  </body>
</html>