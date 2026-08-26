<?php
$_SESSION['is_adminlogin'] = true;

include('adminnav.php');
include('dbconnection.php');

?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <!--Table-->
    <p class=" bg-secondary text-black p-2"><b>Products/Spare Detail</b></p>
  <?php
    $sql = "SELECT * FROM assets_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">DOP</th>
        <th scope="col">Available</th>
        <th scope="col">Total</th>
        <th scope="col">Original Cost Each</th>
        <th scope="col">Selling Price Each</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo '<tr>
        <th scope="row">'.$row["pid"].'</th>
        <td>'.$row["pname"].'</td>
        <td>'.$row["pdop"].'</td>
        <td>'.$row["pava"].'</td>
        <td>'.$row["ptotal"].'</td>
        <td>'.$row["poriginalcost"].'</td>
        <td>'.$row["psellingcost"].'</td>
        <td>
          <form action="editproduct.php" method="POST" class="d-inline"> 
          <input type="hidden" name="id" value='. $row["pid"] .'>
          <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" name="view" value="View">
          <i class=" mdi mdi-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline">
          <input type="hidden" name="id" value='. $row["pid"] .'>
          <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" name="delete" value="Delete">
          <i class="mdi mdi-delete"></i></button></form>
          <form action="sellproduct.php" method="POST" class="d-inline">
          <input type="hidden" name="id" value='. $row["pid"] .'>
          <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" name="issue" value="Issue">
          <i class="mdi mdi-eye"></i></button></form>
        </td>
      </tr>';
    }
    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?> <div class="float-right ml-3 mb-2">
  <a class="btn btn-outline-success " href="addproduct.php"><i class="mdi mdi-plus "></i></a>

</div>
</div>
</div>
<!-- <a class="btn btn-danger box" href="addproduct.php"><i class="fas fa-plus fa-2x"></i></a> -->
</div>