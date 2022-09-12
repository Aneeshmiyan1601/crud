<?php
    require 'db.php';
    if(ISSET($_POST['search'])){
?>
    <center><h2>Employee Details</h2></center>
    <div class="table-wrapper">
      <table class="fl-table">
        <thead>
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
            ?>
                    <tr>
                        <td><?php echo $fetch['id']?></td>
                        <td><?php echo $fetch['employee_name']?></td>
                        <td><?php echo $fetch['employee_email']?></td>
                        <td><?php echo $fetch['employee_number']?></td>
                        <td><?php echo $fetch['employee_id']?></td>
                        <td><a class="edit_btn" href="employee_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a href="employee_delete1.php?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
                    </tr>
            <?php
                    }
                }else{
                    echo "<tr><td colspan='3' class='text-danger'><center>No result found!</center></td></tr>";
                }
            ?>
        </tbody>
    </table>
<?php        
    }else{
?>
     <center><h2>Employee Details</h2></center>
          <div class="table-wrapper">
          <table class="fl-table">

          <thead>

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

      ?>                

    </tbody>

  </table>


  
<?php
    }
?>
    
