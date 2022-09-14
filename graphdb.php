<?php
// MySQL database connection code
$conn    = mysqli_connect("localhost","root","1234","employee_details") or die("Error " . mysqli_error($connection));
//Fetch sports data

$sql = "SELECT * FROM employee_demo";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $orgname = $row['status'];
    $count = $row['id'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $orgname), array('v'=>(int)$count)) );
}
$data = json_encode($array);
echo $data;
?>