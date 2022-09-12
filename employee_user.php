<?php 

include "db.php";

  if (isset($_POST['submit'])) {

    $employee_name = $_POST['employee_name'];

    $employee_email = $_POST['employee_email'];

    $employee_number = $_POST['employee_number'];

    $employee_id = $_POST['employee_id'];

    $select = mysqli_query($conn, "SELECT * FROM employee_demo WHERE employee_name = '".$_POST['employee_name']."'");
    if(mysqli_num_rows($select)) {
      // header('Location: index.php');

      echo '<script>alert("User Name Already Exists!..Kindly Take Another Name")</script>';
      echo '<script>window.location.href = "index.php"; </script>';
      exit;
    }
      $empid = mysqli_query($conn, "SELECT * FROM employee_demo WHERE employee_id = '".$_POST['employee_id']."'");
      if(mysqli_num_rows($empid)) {
        // header('Location: index.php');
        // exit('This employee id already exists');
        echo '<script>alert("User Id Already Exists!..Kindly Take Another Id")</script>';
        echo '<script>window.location.href = "index.php"; </script>';
      exit;

      
    }else{

    $sql = "INSERT INTO `employee`(`employee_name`, `employee_email`, `employee_number`, `employee_id`) VALUES('$employee_name','$employee_email','$employee_number','$employee_id')";
    $sql1 = "INSERT INTO `employee_demo`(`employee_name`, `employee_email`, `employee_number`, `employee_id`) VALUES('$employee_name','$employee_email','$employee_number','$employee_id')";

    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);

    if ($result == TRUE) {

      // echo "New record created successfully.";
      // header('Location: index.php');

    }if($result1 == $result){

      echo '<script>alert("New record created Successfully")</script>';
      echo '<script>window.location.href = "index.php"; </script>';
      

    }
    else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 
  }
    $conn->close(); 

  }

// update list start




?>
