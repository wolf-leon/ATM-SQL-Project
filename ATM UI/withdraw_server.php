<?php
session_start();
?>
<?php 
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="atmdb"; // Database name
$tbl_name="accounts"; // Table name

// Connect to server and select database.
$conn=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

$twok=$_POST['twok'];
$onek=$_POST['onek'];
$fivehundred=$_POST['fivehundred'];
$hundred=$_POST['hundred'];
$fifty=$_POST['fifty'];
$amount=$_POST['amount'];

$balance = 0;
$atm_cash = 0;
$card_no=0;
$op_id=1;
date_default_timezone_set("Asia/Calcutta");
$date = date('Y-m-d H:i:s');
$_SESSION['date']=$date;

echo "$amount<br>";
//Fetching Account Balance

$select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($conn, $select_query) or die(mysqli_error($conn));
$balance=mysqli_fetch_array(($result));


//Fetching Amount of Cash Available in ATM
$select_query="SELECT total_balance FROM denomination";
$result= mysqli_query($conn, $select_query) or die(mysqli_error($conn));
$atm_cash=mysqli_fetch_array(($result));

//echo "$_SESSION[fname]";
echo "$atm_cash<br>";
echo "$balance<br>";
echo "$denomination_total<br>";

//&& $balance>=$denomination_total && $atm_cash>=$denomination_total

if($denomination_total!=$amount)
{
	header('Location: http://localhost/atm_system/withdraw_error_mismatch.html');
}
else if ($balance>=$amount && $atm_cash>=$amount) {
    //echo "Record updated successfully";
    $denomination_total=$twok*2000+$onek*1000+$fivehundred*500+$hundred*100+$fifty*50;
$query_match = "UPDATE denomination SET fifty = fifty-$fifty,hundred=hundred-$hundred,fivehundred=fivehundred-$fivehundred,
onethousand=onethousand-$onek,twothousand=twothousand-$twok,total_balance=
total_balance-$denomination_total";
$query_bal = "UPDATE accounts SET balance = balance-$amount WHERE card_number='$_SESSION[fname]'";
$query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','$amount','$date','1')";
mysqli_query($conn,$query_transaction);
mysqli_query($conn,$query_match);
mysqli_query($conn,$query_bal);
redirect('http://localhost/atm_system/collect_cash.html');
}
else if($balance<$amount) {
    $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','$amount','$date','1')";
    mysqli_query($conn,$query_transaction);
    redirect('http://localhost/atm_system/withdraw_error_balance.html');

    
}
else if($atm_cash<$denomination_total) {
    $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','$amount','$date','1')";
	mysqli_query($conn,$query_transaction);
    redirect('http://localhost/atm_system/withdraw_error_atm.html');
}
//mysqli_close($conn);

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?> 
