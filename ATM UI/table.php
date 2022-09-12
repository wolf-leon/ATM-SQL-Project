<?php
include("config.php");
$result=mysqli_query($db,"SELECT*FROM transaction order by trans_id DESC")

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
  <th>Card Number</th>
  <th>Operation Type</th>
  <th>Amount </th>
  <th>Transaction Time</th>
<?php
while($res=mysqli_fetch_array(($result))){
  echo '<tr>';
  echo'<td>'.$res['card_number'].'</td>';
  echo'<td>'.$res['operation'].'</td>';
  echo'<td>'.$res['amount'].'</td>';
  echo'<td>'.$res['trans_time'].'</td>';

  echo '</tr>';
}

?>

</table>
      

       <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>