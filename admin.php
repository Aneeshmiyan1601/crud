<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

include "db.php";

$sql = "SELECT * FROM employee_demo";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Access</title>
</head>
<body>
<center><h2>All Employee Details</h2></center>
<a href="mainexport.php" class="suc_btn">Export</a>
          <div class="table-wrapper">
          <table class="fl-table">

          <thead>

            <tr>

              <th>SI.NO</th>

              <th>Employee Name</th>

              <th>Employee Email</th>

              <th>Employee PhoneNumber</th>

              <th>Employee ID</th>

              <th>Status</th>

              <th>Action</th>

            </tr>

          </thead>

      <?php

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {

      ?>

        <tr>

          <td><?php echo $row['id']; ?></td>

          <td><?php echo $row['employee_name']; ?></td>

          <td><?php echo $row['employee_email']; ?></td>

          <td><?php echo $row['employee_number']; ?></td>

          <td><?php echo $row['employee_id']; ?></td>

          <td><?php echo $row['status']; ?></td>

          <td>
            <a class="edit_btn" href="employee_active.php?id=<?php echo $row['id']; ?>">Active</a>
            &nbsp;
            <a href="employee_delete1.php?id=<?php echo $row['id']; ?>" class="del_btn">Deactivate</a>
            &nbsp;
            <a href="employee_delete.php?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>

        </tr>                       

      <?php       }

                }

      ?>                

    </tbody>

  </table>
    
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>