<?php
session_start(); // Start the session before accessing or setting session variables

// $_SESSION['is_adminlogin'] = true;

include('adminnav.php');
include('dbconnection.php');

  $maxid= "SELECT MAX(custid) FROM customer_tb";
  $mid = $conn->query($maxid);
 
  while($row = mysqli_fetch_array($mid)){
    $mmid =  $row['MAX(custid)'];
}

$sql = "SELECT * FROM customer_tb WHERE CAST(custid AS INT) = '$mmid'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
 echo "<div class='ml-5 mt-5'>
 <h3 class='text-center'>Customer Bill</h3>
 <table class='table'>
  <tbody>
  <tr>
    <th>Customer ID</th>
    <td>".$row['custid']."</td>
  </tr>
   <tr>
     <th>Customer Name</th>
     <td>".$row['custname']."</td>
   </tr>
   <tr>
     <th>Address</th>
     <td>".$row['custadd']."</td>
   </tr>
   <tr>
   <th>Product</th>
   <td>".$row['cpname']."</td>
  </tr>
   <tr>
    <th>Quantity</th>
    <td>".$row['cpquantity']."</td>
   </tr>
   <tr>
    <th>Price Each</th>
    <td>".$row['cpeach']."</td>
   </tr>
   <tr>
    <th>Total Cost</th>
    <td>".$row['cptotal']."</td>
   </tr>
   <tr>
   <th>Date</th>
   <td>".$row['cpdate']."</td>
  </tr>
   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
    <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td>
  </tr>
  </tbody>
 </table> </div>
 ";
}
else {
  echo "";
}
?>