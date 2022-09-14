<?php 
session_start();

// Use Select query to Slect the data brom database

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



</head>

<body>

    <nav class="navMenu">
    <a href="graph.php">Graph</a>
      <a href="logout.php">Logout</a>
      <div class="dot"></div>
    </nav>
   <center><h1>Employee Details</h1></center>

    <center><h2>Add New Employee</h2></center>
    <form action="employee_user.php" id="form" method="post">
      <div class="input-group">
      
        <label>Name :</label>
        <input type="text"  id="txtName" name="employee_name" placeholder="please Enter Your Name" onkeyup="ValidateName();"  autocomplete="off" required />
        <span id="lblError" style="color: red"></span>
      </div>
      <div class="input-group">
        <label>Email :</label>
        <input type="email"  id="txtEmail"  name="employee_email"  placeholder="please Enter Your mailid" onkeyup="ValidateEmail();" autocomplete="off" required />
        <span id="lblError1" style="color: red"></span>
      </div>
      <div class="input-group">
        <label>Mobile Number :</label>
        <input type="tel"  id="txtNumber" maxlength="10"  name="employee_number" placeholder="please Enter Your Phone Number" onkeyup="ValidateNumber();"  autocomplete="off"  required />
        <span id="lblError2" style="color: red"></span>
      </div>
      <div class="input-group">
        <label>Employee Id :</label>
        <input type="text" name="employee_id" placeholder="Enter Your Employee Id" autocomplete="off" required>
        <!-- <span id="lblError3" style="color: red"></span> -->
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
                    <tr>
                      <td><a class="edit_btns" href="export.php">Export</a></td> 
                    </tr>               
                </div>
              </form>
              
               <br />
               <?php include 'search_query.php'?>        
             </div>



    <!-- view side -->


         
<script>
  // for Email function error shows
  $(function() {

$('#txtEmail').keydown(function (e) {

  if (e.spacekey) {
  
    e.preventDefault();

    
  } else {
  
    var key = e.keyCode;
    
    if (!((key == 8) || (key == 16) || (key == 190)|| (key == 13)|| (key == 9)|| (key == 18)|| (key == 46) || (key >= 48 && key <= 57) || (key >= 65 && key <= 90)
     )) {
    
      e.preventDefault();
      if (!expr.test(email)) {            
         }


    }
    
  }


  
});

});
function ValidateEmail() {
        var email = document.getElementById("txtEmail").value;
        var lblError = document.getElementById("lblError1");
        lblError.innerHTML = "";
        var expr = /[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[com]{3}/;
        if (!expr.test(email)) {            
            lblError.innerHTML = "Invalid email id. Please use in correct format Ex: demo@gmail.com";
        }
    }
  // for Name function error shows
  $(function() {

$('#txtName').keydown(function (e) {

  if (e.shiftKey) {
  
    e.preventDefault();
    
  } else {
  
    var key = e.keyCode;
    
    if (!((key == 8) || (key == 32) || (key == 13)|| (key == 9)|| (key == 18)|| (key == 46) || (key >= 97 && key <= 123) || (key >= 65 && key <= 90)  
     )) {
    
      e.preventDefault();
            if (!expr.test(name)) {            
        }


    }
    
  }
  
});
});
function ValidateName() {
        var name = document.getElementById("txtName").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /([a-zA-Z]{1,30})/;
        if (!expr.test(name)) {            
            lblError.innerHTML = "Invalid name address. Please use Alpahabet Ex: Harish";
        }
    }


// for Number function error shows
  $(function() {

$('#txtNumber').keydown(function (e) {

  if (e.shiftKey) {

    e.preventDefault();

  } else {
  
    var key = e.keyCode;
    
    if (!((key == 8)  || (key == 13)|| (key == 9)|| (key == 18)|| (key == 46) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) 
      
     )) {
    
      e.preventDefault();

      if (!expr.test(number)) {            

      }

    }
    
  }
  
});

});

function ValidateNumber() {
        var number = document.getElementById("txtNumber").value;
        var lblError = document.getElementById("lblError2");
        lblError.innerHTML = "";
         var expr = /[6789][0-9]{9}/;
        if (!expr.test(number)) {            
            lblError.innerHTML = "Invalid Number pattern. Please use Numbers Ex: 8123456789";
        }
    }


</script>
    
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>