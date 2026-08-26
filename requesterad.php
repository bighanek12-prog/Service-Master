<?php
    include('adminnav.php');
    include('dbconnection.php');
    
    // include('sessionadmin.php');

 if(isset($_SESSION['is_adminlogin'])){
 
 } else {
  echo 'else';
  
 }
    ?>
    <div class="col-sm-9 col-md-10 mt-5 text-center">
    <!--Table-->
    <p class=" bg-secondary text-black p-2"><b>List of Requesters</b></p>
    <?php
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
   echo '<table class="table">
    <thead>
     <tr>
      <th scope="col">Requester ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
     </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
     echo '<tr>';
      echo '<th scope="row">'.$row["id"].'</th>';
      echo '<td>'. $row["firstName"].'</td>';
      echo '<td>'. $row["lastName"].'</td>';
      echo '<td>'.$row["email"].'</td>';
      echo '<td><form action="adminuseredit.php" method="POST" class="d-inline"> 
      <input type="hidden" name="id" value='. $row["id"] .'>
      <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" name="view" value="View">
      <i class="mdi mdi-account-convert"></i></button></form>  
      <form action="" method="POST" class="d-inline">
      <input type="hidden" name="id" value='. $row["id"] .'>
      <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" name="delete" value="Delete">
      <i class="mdi mdi-delete"></i></button></form></td>
     </tr>';
    }
  
   echo '</tbody>
   </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM users WHERE id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
  <div class="float-right ml-3 mb-2">
          <a class="btn btn-outline-success " href="insertreq.php"><i class="mdi mdi-plus "></i></a>
  
  </div>
  </div>
 </div>
  </div>
  