<?php
include("config.php");
session_start();
$result=mysqli_query($db,"SELECT*FROM transactions where card_number=$_SESSION('fname') order by transaction_time desc limit 2")
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

  <!-- title -->
        <title>ABC Bank</title>

        <!-- bootstrap cdn link -->
        <!-- CSS only -->
<table class="transactions" border=2> 
  <th>Transaction ID</th>
  <th>Card Number</th>
  <th>Operation </th>
  <th>Amount</th>
  <th> Transaction Time</th>
  <th> Transaction Status</th>

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
      
<h1>Transaction Type</h1>  <p>1. Withdraw</p>
  <p>2. Transfer</p>
  <p>3. View Balance</p>
  <p>4. Deposit</p>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>