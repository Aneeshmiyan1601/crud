<?php 

include "db.php";

  if (isset($_POST['submit'])) {

    $employee_name = $_POST['employee_name'];

    $employee_email = $_POST['employee_email'];

    $employee_number = $_POST['employee_number'];

    $employee_id = $_POST['employee_id'];

    $select = mysqli_query($conn, "SELECT * FROM employee WHERE employee_name = '".$_POST['employee_name']."'");
    if(mysqli_num_rows($select)) {
      // header('Location: index.php');
      exit('This username already exists');
    }
      $empid = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id = '".$_POST['employee_id']."'");
      if(mysqli_num_rows($empid)) {
        // header('Location: index.php');
        exit('This employee id already exists');

      
    }else{

    $sql = "INSERT INTO `employee`(`employee_name`, `employee_email`, `employee_number`, `employee_id`) VALUES('$employee_name','$employee_email','$employee_number','$employee_id')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";
      header('Location: index.php');

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 
  }
    $conn->close(); 

  }

// update list start




?>
