<?php
include("config.php");
$result=mysqli_query($db,"SELECT*FROM transactions order by transaction_id DESC")
?>
<!DOCTYPE html>
<html>
<a href="denomination.php" style="color: #000000;"><i class="material-icons" style="font-size:30px">arrow_back</i></a>
<div data-include="test.html"></div>
<h1 class="text-center">Transaction Log</h1>
<p  class="text-center" > Operation Type : &nbsp; 1. Withdraw  &nbsp;&nbsp; 2. Transfer &nbsp;&nbsp;  3. View Balance &nbsp;&nbsp;  4. Deposit</p><!-- table to display Transaction -->
<p  class="text-center" >Status: &nbsp; 1. Success &nbsp; &nbsp; 0. Fail </p> 

<table class="transactions" border=2> 
<br>
<th>Transaction ID</th>
<th>Card Number</th>
  <th>Operation Type</th>
  <th>Amount </th>
  <th>Transaction Time</th>
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
<!-- JavaScript Bundle with Popper -->
<script src="csi.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>