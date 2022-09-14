<?php


session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


include('db.php');

$active = "SELECT COUNT(id) as ID, status as Status FROM employee_demo GROUP BY status ORDER BY COUNT(id)";
$totals = "SELECT * FROM employee_demo";

$resultactive = $conn->query($active);
// $result = $conn->query($totals);

$result = mysqli_query($conn, $totals);

$rowcount = mysqli_num_rows( $result );

// printf($rowcount);



?>
<html>
  <head>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          
          <?php 


                while ($chart = mysqli_fetch_assoc($resultactive)) {
                    
                    echo "['".$chart['Status']."',".$chart['ID']."],";
                }
          
          
          ?>
        ]);

        

        var options = {
          title: 'Total employee in the graph : <?php printf($rowcount);?>',
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body class="bg-dark">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>My Employee Counts</h3>
                    </div>

                    <div class="card-body">
                    
                    <div id="piechart" style="width: 600px; height: 500px;">
                    </div>

                       

                    
                    <div class="card-footer">

                    </div>

                </div>

            </div>

    </div>

    
    
  </body>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
