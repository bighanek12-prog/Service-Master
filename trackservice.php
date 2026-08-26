<!DOCTYPE html>
<html lang="en">
<head>
<?php include('usernav.php'); ?>
</head>
<body>
    
    <?php include('dbconnection.php'); ?>

    <?php
    if (isset($_SESSION['email'])) {
        echo "<script> location.href='login.php'; </script>";
    }
    ?>
    
    <div class="col-sm-6 mt-5 mx-3">
        <form action="" method="post" class="mt-3 form-inline d-print-none">
            <div class="form-group mr-3">
                <label for="checkid">Enter Email:</label>
                <input type="email" class="form-control ml-3" id="checkid" name="email" aria-label="Email" required>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-fw">Search</button>
        </form>

        <?php
        if (isset($_REQUEST['email'])) {
            $email = $conn->real_escape_string($_REQUEST['email']);
            $sql = "SELECT * FROM assignwork_tb WHERE requester_email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h3 class="text-center text-primary mt-5">Assigned Work Details</h3>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
        <td>Request ID</td>
        <td>
          <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Info</td>
        <td>
          <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
        </td>
      </tr>
      <tr>
        <td>Request Description</td>
        <td>
          <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td>
          <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 1</td>
        <td>
          <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address Line 2</td>
        <td>
          <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
        </td>
      </tr>
      <tr>
        <td>Pin Code</td>
        <td>
          <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
        </td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td>
          <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
        </td>
      </tr>
      <tr>
        <td>Assigned Date</td>
        <td>
          <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
        </td>
      </tr>
      <tr>
        <td>Technician Name</td>
        <td><?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?></td>
      </tr>
      <tr>
        <td>Customer Sign</td>
        <td></td>
      </tr>
      <tr>
        <td>Technician Sign</td>
        <td></td>
      </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-outline-danger btn-fw" onclick="window.print()">Print</button>
                    <a href="" class="btn btn-outline-dark btn-fw">Close</a>
                </div>
                <?php
            } else {
                echo '<div class="alert alert-dark mt-4" role="alert">Your Request is Still Pending</div>';
            }
        }
        ?>
    </div>
</body>
</html>