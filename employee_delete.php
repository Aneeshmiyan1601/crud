<?php 

include "db.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];
    $user_ids = $_GET['id'];

    $sql = "DELETE FROM `employee` WHERE `id`='$user_id'";
    $sql1 = "DELETE FROM `employee_demo` WHERE `id`='$user_ids'";

     $result = $conn->query($sql);
     $result1 = $conn->query($sql1);

     if ($result == TRUE) {
        
        // header('Location: admin.php');

    }if ($resul1 == TRUE) {
        // header('Location: admin.php');
        
    }else{

        // header('Location: admin.php');
         echo '<script>alert("Permanently Record Delete Successfully")</script>';
         echo '<script>window.location.href = "admin.php"; </script>';

    }

} 

?>

