<?php 

include "db.php";

$sql = "SELECT * FROM employee_demo";

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
        <input type="text"  name="employee_name" placeholder="please Enter Your Name" pattern="[A-Za-z]{1,30}" title="Dont use Number! Use Name eg:jhon" required />
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


    <!-- search bar starts -->

            <div class="search">
              <form method="POST" action="">
                <div class="form-inline">
                    <input type="text" class="form-control" name="keyword" placeholder="Search here..." >
                    <button class="edit_btn" name="search">Search</button>&nbsp;
          
                    <a class="edit_btn" href="export.php">Export</a>                    
                </div>
              </form>
               <br />
               <?php include 'search_query.php'?>        
             </div>



    <!-- view side -->


         

    
</body>
</html>
