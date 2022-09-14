<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

include "db.php"; 

// Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $user_id=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `employee_demo` SET 
            `status`= 'deactive' WHERE id='$user_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    // header('location: dashboard.php');

    echo '<script>alert("Record Delete Successfully")</script>';
    echo '<script>window.location.href = "dashboard.php"; </script>';



    if (isset($_fetch['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $user_id=$_fetch['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `employee_demo` SET 
            `status`=deactive WHERE id='$user_id'";
  
        // Execute the query
        mysqli_query($conn,$sql);
    }
  
    // Go back to course-page.php
    // header('location: dashboard.php');

    echo '<script>alert("Record Delete Successfully")</script>';
    echo '<script>window.location.href = "dashboard.php"; </script>';

?>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

