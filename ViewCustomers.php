<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
    //$sql = "SELECT * FROM customerinfo" ;
    $sql = "SELECT * FROM accountdetails" ;
    $result = $conn->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>    
    <!-- CSS style sheet -->
 
  <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 60px;
               font-size:25px;
               padding-bottom: 100px;
               background: #f5fce3;
               background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
               background: linear-gradient(to right, #f5fce3, #e1e6d6 );

              }
        .container{      
                padding-top:5px;
                display: block;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                width: 50%;    
        }

        td,th { border: 1px solid #ddd; padding: 8px;}
        #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color: #d2d3d4; }
        #Table tr:nth-child(odd){ background-color: #dee2e3; }
        #Table tr:hover{ background-color: #b5d0eb; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #608fb3; color:white; }
        footer {
            background-color: #e8d7a2;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 100px;
            width: 100%;
            overflow: hidden;
          
        }
    </style>
</head>

<body>
  <!-- navbar -->
  <?php include('navbar.php'); ?>
       <div class="container">
            <h2 style="text-align: center">Customer Details</h2>
            <br>                   
            <table id="Table">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Account No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Balance</th>  
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['accID']; ?></td>
                    
                    <td ><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    
                </tr>
                <?php
                }
                $conn->close();
                ?> 
            </table>
        </div>
        <footer style="text-align: center">
            <p>Designed and Coded by: Swati Tripathi</p>
        </footer>
</body>
</html>


