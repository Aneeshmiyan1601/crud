<?php 

include "db.php";

$sql = "SELECT * FROM employee";

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
</head>

<body>

   <center><h1>Employee Details</h1></center>

    <center><h2>Add New Employee</h2></center>
    <form action="employee_user.php" method="post">
      <div class="input-group">
        <label>Name :</label>
        <input type="text" maxlength="30" name="employee_name" placeholder="please Enter Your Name" pattern="[A-Za-z]{1,30}"  required />
      </div>
      <div class="input-group">
        <label>Email :</label>
        <input type="email"  name="employee_email" placeholder="please Enter Your mailid" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[com]{3}"  required />
      </div>
      <div class="input-group">
        <label>Mobile Number :</label>
        <input type="tel" maxlength="10"  name="employee_number" placeholder="please Enter Your Phone Number" pattern="[6789][0-9]{9}"  required />
      </div>
      <div class="input-group">
        <label>Employee Id :</label>
        <input type="text" name="employee_id" placeholder="Enter Your Employee Id" required>
      </div>

      <div class="input-group">
          <button class="btn" type="submit" name="submit">Submit</button>
      </div>
    </form>

    <!-- view side -->


          <center><h2>Employee Details</h2></center>
          <div class="table-wrapper">
          <table class="fl-table">

          <thead>

            <tr>

              <th>SI.NO</th>

              <th>Employee Name</th>

              <th>Employee Email</th>

              <th>Employee PhoneNumber</th>

              <th>Employee ID</th>

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

          <td><a class="edit_btn" href="employee_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a href="#" class="del_btn"  onclick="SomeDeleteRowFunction(this)">Delete</a></td>

        </tr>                       

      <?php       }

                }

      ?>                

    </tbody>

  </table>


  <script>
    function SomeDeleteRowFunction(o) {
     //no clue what to put here?
     var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
    }

  </script>



    
</body>
</html>
