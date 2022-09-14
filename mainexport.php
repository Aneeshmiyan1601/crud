<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Employee_main_list.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'db.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
					<th>SI.NO</th>
					<th>Employee Name</th>
					<th>Employee Email</th>
					<th>Employee Number</th>
					<th>Status</th>
					<th>Employee ID</th>
				</tr>
			<tbody>
	";
 
	$query = $conn->query("SELECT * FROM `employee_demo`");
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
					<td>".$fetch['id']."</td>
					<td>".$fetch['employee_name']."</td>
					<td>".$fetch['employee_email']."</td>
					<td>".$fetch['employee_number']."</td>
					<td>".$fetch['status']."</td>
					<td>".$fetch['employee_id']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>