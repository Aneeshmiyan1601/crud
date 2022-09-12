<?php 

include "db.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `employee_demo` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        
        // header('Location: index.php');
        echo '<script>alert("Record Delete Successfully")</script>';
        echo '<script>window.location.href = "index.php"; </script>';

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>

