<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include('adminnav.php'); ?>
    <div class="col-sm-9 col-md-10 mt-5">
        <?php 
        $sql = "SELECT * FROM assignwork_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '<table class="table" aria-describedby="assignedWorkDescription">
            <caption id="assignedWorkDescription">List of assigned work with actions to view or delete each item.</caption>
            <thead>
                <tr>
                    <th scope="col">Req ID</th>
                    <th scope="col">Request Info</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Technician</th>
                    <th scope="col">Assigned Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';
            while($row = $result->fetch_assoc()){
                echo '<tr>
                <th scope="row">'.$row["request_id"].'</th>
                <td>'.$row["request_info"].'</td>
                <td>'.$row["requester_name"].'</td>
                <td>'.$row["requester_add2"].'</td>
                <td>'.$row["requester_city"].'</td>
                <td>'.$row["requester_mobile"].'</td>
                <td>'.$row["assign_tech"].'</td>
                <td>'.$row["assign_date"].'</td>
                <td>
                    <form action="workassignform.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="'. $row["request_id"] .'">
                        <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" 
                         name="view" value="View" aria-label="View details for Request ID '.$row["request_id"].'">
                        <i class="mdi mdi-eye" aria-hidden="true"></i></button>
                    </form>
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="'. $row["request_id"] .'">
                        <button type="submit" class="btn btn-outline-primary btn-rounded btn-icon" 
                         name="delete" value="Delete" aria-label="Delete Request ID '.$row["request_id"].'">
                        <i class="mdi mdi-delete" aria-hidden="true"></i></button>
                    </form>
                </td>
                </tr>';
            }
            echo '</tbody> </table>';
        } else {
            echo "<p>No results found.</p>";
        }
        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
            if($conn->query($sql) === TRUE){
                echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
            } else {
                echo "<p>Unable to Delete Data.</p>";
            }
        }
        ?>
    </div>
</body>
</html>