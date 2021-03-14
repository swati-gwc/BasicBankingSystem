<!-- 
MADE BY SWATI TRIPATHI

THIS PAGE IS EXECEUTED WHEN USER CLICKS BUTTON ON  TRANSFER.php (TRANSACTION OF MONEY  PAGE) 
THIS IS RESPONSIBLE FOR UPDATING TABLES IN DATABASE
-->
<?php


header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat,26 Jul 1997 05:00:00 GMT");
//CONNECTING TO THE DATABASE
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname); 
    //IF CONNECTION IS NOT SUCCESSSFUL
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
?>
<!--HTML CODE STARTS -->
<html>
<head> 
    <title>Transaction Page</title>
    <style>
    body {
               padding-top: 60px;
               font-size:25px;
               background: #f5fce3;
               background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
               background: linear-gradient(to right, #f5fce3,#e1e6d6);
        }
    .center{
        background: #91c1c9;
        background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
        background: linear-gradient(to bottom, #91c1c9, #3a5f66);
        padding-top:5px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;    
    }
    .center2{
        font-size:15px;
        width:100%;
    }
    table {
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #d2d3d4; }
    #Table tr:nth-child(odd){ background-color: #dee2e3; }
    #Table tr:hover{ background-color: #b5d0eb; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

    </style>    
     <script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
</head>
<!-- BODY-->
<body>
<!-- INCLUDING NAVBAR-->
<?php include('navbar.php'); ?>

<!-- PHP CODE STARTS HERE-->
<!-- when user clicks proceed button then below code is executed-->
<?php 
  if(isset($_POST['form_submitted'])){

    //These variables are collecting form data
      $PAYER_ID = $_POST['payerID'];
      $PAYEE_ID = $_POST['payeeID'];
      $AMOUNT = $_POST['amount'];

      if(empty($PAYER_ID) || empty($PAYER_ID) || empty($AMOUNT)){
        //javascript code to notify user not to leave field blank         
        echo "<script> alert('Empty Fields !!');
        window.location.href='Transfer.php';
        </script>";  
        exit() ;           
      }

      //CHECK IF AMOUNT IS GREATER THAN 0 OR NOT
      if($AMOUNT <=0){
        echo "<script> alert('Amount must be greater than zero !!');
        window.location.href='Transfer.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($AMOUNT) || !ctype_digit($PAYER_ID) || !ctype_digit($PAYEE_ID)){
        echo "<script> alert('Entered value can only contain digit!!');
        window.location.href='Transfer.php';
        </script>";  
        exit() ;  
      }

      //CHECK IF PAYER ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accID='$PAYER_ID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payer ID does not exists !!');
        window.location.href='Transfer.php';
        </script>";  
        exit() ;      
      }
    
      //CHECK IF PAYEE ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accID='$PAYEE_ID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payee ID does not exists !!');
        window.location.href='Transfer.php';
        </script>";  
        exit() ;      
      }
      
      //CHECK IF PAYER HAS SUFFICIENT MONEY OR NOT
      $sql = "Select * from accountdetails where accID='$PAYER_ID'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
               if($row1['balance']<$AMOUNT){
                echo "<script> alert('Payer does not have required balance !!');
                window.location.href='Transfer.php';
                </script>";  
                exit() ; 
                }  
          }  

   
      //THIS ELSE CODE BELOW IS PERFORMING TRANSACTION FROM PAYER AND PAYEE BANK ACCOUNTS
      //BELOW CODE RUNS WHEN ALL DETAILS ENTERED BY USER ARE CORRECT OR NOT

          echo "<div class ='center'>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center'>Transaction Successfully Completed</h1>
                <p  style='text-align: center; font-size:25px;'>Details of payer and payee are as follows<p>
                <table id = 'Table'>
                <tr>
                <th></th>
                <th>Account No</th>
                <th>Name</th>
                <th>Email</th>
               
                </tr>";

          //SELECTING PAYER DETAILS FROM ACCOUNTDETAILS TABLE
          $sql = "Select * from accountdetails where accID='$PAYER_ID'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
                //row1 contains payer details
                       echo "<tr> 
                            <td> Payer </td>
                            <td>".$row1['accID']."</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['email']."</td>
                           
                            </tr>";                        
                       $PayerCurrentBalance = $row1['balance'];            
            }
        
          //SELECTING PAYEE DETAILS FROM ACCOUNTDETAILS TABLE
          $sql2 = "Select * from accountdetails where accID='$PAYEE_ID'";
          if($result = $conn->query($sql2)){
                //row2 contains payee details
                $row2 = $result->fetch_array();
                       echo "<tr> 
                            <td> Payee </td>
                            <td>".$row2['accID']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['email']."</td>
                           
                            </tr>"; 
                        $PayeeCurrentBalance = $row2['balance'];                       
               
               
            }               
            echo "</table>";
            $PayeeCurrentBalance += $AMOUNT;
            $PayerCurrentBalance -= $AMOUNT;
            echo "<br>";
            echo "<table id = 'Table' style='margin-bottom:15px;'>
                    <tr>
                        <th></th>
                        <th>Old Balance</th>
                        <th>New Balance</th>
                    </tr>
                    <tr>
                        <th>Payer</th>
                        <td style='color:black'>".$row1['balance']."</td>                        
                        <td style='color:black'>".$PayerCurrentBalance."</td>
                    </tr>
                    <tr>
                        <th>Payee</th>
                        <td style='color:black'>".$row2['balance']."</td>                        
                        <td style='color:black'>".$PayeeCurrentBalance."</td>
                    </tr>";
            echo "</table>";
            //echo "Payer has available Balance = ".$row1['balance']."<br>";           
            //echo "Payer has available Balance = ".$PayerCurrentBalance."<br>";
            //echo "Payee has available Balance = ".$PayeeCurrentBalance."<br>";

           //FOR UPDATING DETAILS OF PAYER
           $updatepayer ="Update accountdetails set balance='$PayerCurrentBalance' where accID='$PAYER_ID'";
           //FOR UPDATING DETAILS OF PAYEE
           $updatepayee ="Update accountdetails set balance='$PayeeCurrentBalance' where accID='$PAYEE_ID'";

           //CHECK IF PAYER DETAILS ARE UPADTED OR NOT 
           if($conn->query($updatepayer)==true){
                ?>         
                <script>console.log("PAYER DETAILS UPDATED!!")</script>
                <?php
           }
           else{
                ?>        
                <script>alert("PAYER DETAILS NOT UPDATED!!")</script>
                <?php
           }

           //CHECK IF PAYEE DETAILS ARE UPADTED OR NOT 
           if($conn->query($updatepayee)==true){
                    ?>         
                    <script>console.log("PAYEE DETAILS UPDATED! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("PAYEE DETAILS NOT UPDATED! ERROR OCCURED!")</script>
                    <?php
            }

            //SETTING TIME ZONE
            date_default_timezone_set('Asia/Kolkata');           
            $date = date('Y-m-d H:i:s',time());
            //echo "Current time is : ".$date;

            //FOR UPDATING HISTORY TABLE WHICH MAINTAINS RECORDS OF ALL TRANSACTIONS
            $InsertTransactTable ="Insert into history (payer, payerAcc, payee, payeeAcc, amount, time) values ('$row1[name]','$row1[accID]','$row2[name]','$row2[accID]','$AMOUNT','$date')";
            //EXECUTING INSERT COMMAND AND CHECKING IF INSERTION WAS SUCCESSULL OR NOT
            if($conn->query($InsertTransactTable)==true){
                    ?>         
                    <script>console.log("Record of this transaction saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }


            echo "<br>";
        echo "</div>";
        echo "</div>";
       // echo"<script>alert('Transaction successfull!!')</script>";
        //END OF ELSE OF PROCEED BUTTON
     // }

  //IF ENDS HERE    
  }else{
      ?>
      <h1>All transactions are up to date</h1>
      <?php
  }
  //DATABASE CONNECTION ENDS HERE
  $conn->close();
  //PHP CODE ENDS HERE
?>
 
             

         

</body>
</html>
<!--HTML CODE ENDS HERE-->
<!--MADE BY SWATI TRIPATHI-->
