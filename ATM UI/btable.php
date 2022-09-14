<?php
include("config.php");
session_start();
$result=mysqli_query($db,"SELECT*FROM transactions where card_number=$_SESSION[fname] order by transaction_time desc limit 5")
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="" type="">
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<a href="balance.php" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">arrow_back</i></a>

    <!-- title -->
    <title>ABC Bank</title>

    <!-- bootstrap cdn link -->
    <!-- CSS only -->
    <table class="transactions" border=2>
    <caption>Recent Transactions</caption>

        <th style="  background-color: #d97b9c;">Transaction ID</th>
        <th style="  background-color: #d97b9c;">Card Number</th>
        <th style="  background-color: #d97b9c;">Operation </th>
        <th style="  background-color: #d97b9c;">Amount</th>
        <th style="  background-color: #d97b9c;"> Transaction Time</th>
        <th style="  background-color: #d97b9c;"> Transaction Status</th>

        <?php
while($res=mysqli_fetch_array(($result))){
  echo '<tr>';
  echo'<td>'.$res['transaction_id'].'</td>';
  echo'<td>'.$res['card_number'].'</td>';
  echo'<td>'.$res['operation'].'</td>';
  echo'<td>'.$res['amount'].'</td>';
  echo'<td>'.$res['transaction_time'].'</td>';
  echo'<td>'.$res['transaction_status'].'</td>';
  echo '</tr>';
}

?>

    </table>

    <p style=" position: fixed;
    bottom: 0;
    right: 0;
    width: 100%;">1. Withdraw 2. Transfer 3. View Balance 4. Deposit</p>
     <p style=" position: fixed;
    bottom: 0;
    padding-left: 90%;
    width: 100%;">1. Success 2. Failed</p>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    </body>

</html>