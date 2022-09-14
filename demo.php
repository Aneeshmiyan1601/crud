<?php


include('db.php');

$sql = "SELECT * FROM employee_demo";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json</title>
</head>
<body>
<?php

// $json = array($result);

// print_r($json);

if ($result->num_rows > 0) {
          
    while ($row = $result->fetch_assoc()) {
        $json = array($row);
        // print_r($json); 
        
        echo json_encode($json);

        
    }
}

?>
</body>
</html>