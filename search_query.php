<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    require 'db.php';
    if(ISSET($_POST['search'])){
?>
  <!-- ater press search button it will function -->
  <div class="table-wrapper">
      <table class="fl-table">
        <thead>
            <tr>
              <td colspan="1"><a class="edit_btns" href="export.php">Export</a></td>
              <td colspan="5"><h2>Employee Details</h2></td>

            </tr>
            <tr>
                <th>SI.NO</th>

                <th>Employee Name</th>

                <th>Employee Email</th>

                <th>Employee PhoneNumber</th>

                <th>Employee ID</th>

                

                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $keyword = $_POST['keyword'];
                $query = mysqli_query($conn, "SELECT * FROM `employee_demo` WHERE `employee_name` LIKE '%$keyword%' or `employee_id` LIKE '%$keyword%' or `employee_email` LIKE '%$keyword%'");
                $count = mysqli_num_rows($query);
                if($count > 0){
                    while($fetch = mysqli_fetch_array($query)){
                      if($fetch['status'] == 'active'){
            ?>
                    <tr>
                        <td><?php echo $fetch['id']?></td>
                        <td><?php echo $fetch['employee_name']?></td>
                        <td><?php echo $fetch['employee_email']?></td>
                        <td><?php echo $fetch['employee_number']?></td>
                        <td><?php echo $fetch['employee_id']?></td>
                        <td><a class="edit_btn" href="employee_update.php?id=<?php echo $fetch['id']; ?>">Edit</a>&nbsp;<a href="employee_delete1.php?id=<?php echo $fetch['id']; ?>" class="del_btn">Delete</a></td>
                    </tr>
                      
            <?php   }
                      }
                }else{
                    echo "<tr><td colspan='6' class='text-danger'><center>No result found!</center></td></tr>";
                }
            ?>
        </tbody>
    </table>
<?php        
    }else{
?>

<!-- before we press search button it will function -->

          <div class="table-wrapper">
          <table class="fl-table">

          <thead>
            <tr>
              <td colspan="6"><h2>Employee Details</h2></td>

            </tr>

            <tr>

              <th>SI.NO</th>

              <th>Employee Name</th>

              <th>Employee Email</th>

              <th>Employee PhoneNumber</th>

              <th>Employee ID</th>
              
              <th>Action</th>

            </tr>

          </thead>

      <?php

        if ($result->num_rows > 0) {
          
          while ($row = $result->fetch_assoc()) {
            if($row['status'] == 'active'){


      ?>


        <tr>

          <td><?php echo $row['id']; ?></td>

          <td><?php echo $row['employee_name']; ?></td>

          <td><?php echo $row['employee_email']; ?></td>

          <td><?php echo $row['employee_number']; ?></td>

          <td><?php echo $row['employee_id']; ?></td>

          <td><a class="edit_btn" href="employee_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a href="employee_delete1.php?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>

        </tr>                       

      <?php       }

                }
              }

      ?>                

    </tbody>

  </table>


  

<?php
    }
?>
    

    <?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
