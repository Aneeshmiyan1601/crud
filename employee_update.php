<?php

include "db.php";

if (isset($_POST['update'])) {
    $employee_name = $_POST['employee_name'];
    $user_id = $_POST['user_id'];
    $employee_email = $_POST['employee_email'];
    $employee_number = $_POST['employee_number'];
    $employee_id = $_POST['employee_id'];


    $sql = "UPDATE `employee` SET `employee_name`='$employee_name',`employee_email`='$employee_email',`employee_number`='$employee_number',`employee_id`='$employee_id' WHERE `id`= '$user_id'";
    $result = $conn->query($sql); 

        if ($result == TRUE) {

            // echo "Record updated successfully.";
            header('Location: index.php');

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 


    if (isset($_GET['id'])) {

        $user_id = $_GET['id']; 
    
        $sql = "SELECT * FROM `employee` WHERE `id`='$user_id'";
    
        $result = $conn->query($sql); 
    
        if ($result->num_rows > 0) {        
    
            while ($row = $result->fetch_assoc()) {

                $employee_name = $row['employee_name'];
                $employee_email = $row['employee_email'];
                $employee_number = $row['employee_number'];
                $employee_id = $row['employee_id'];
                $id = $row['id'];


            }
        }
    }
      

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Edit Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><h1>Employee Edit Details</h1></center>
    <form action="" method="post">
      <div class="input-group">
        <label>Name :</label>
        <input type="text" maxlength="30" name="employee_name" placeholder="please Enter Your Name" pattern="[A-Za-z]{1,30}" value="<?php echo $employee_name; ?>"  required />
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
      </div>
      <div class="input-group">
        <label>Email :</label>
        <input type="email"  name="employee_email" placeholder="please Enter Your mailid" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[com]{3}" value="<?php echo $employee_email; ?>" required />
      </div>
      <div class="input-group">
        <label>Mobile Number :</label>
        <input type="tel" maxlength="10"  name="employee_number" placeholder="please Enter Your Phone Number" pattern="[6789][0-9]{9}"  value="<?php echo $employee_number; ?>" required />
      </div>
      <div class="input-group">
        <label>Employee Id :</label>
        <input type="text" name="employee_id" placeholder="Enter Your Employee Id" value="<?php echo $employee_id; ?>" readonly>
      </div>

      <div class="input-group">
          <button class="btn" type="submit" name="update">Update</button>
      </div>
    </form>
    
</body>
</html>

