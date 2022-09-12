<?php 
$conn=mysqli_connect("localhost","root",""); 
if($conn) 
{ 
echo "Connected"; 
} 
else 
{ 
echo "Connection failed"; 
} 
mysqli_select_db($conn,'atm_system');

$twok=$_POST['twok'];
$onek=$_POST['onek'];
$fivehundred=$_POST['fivehundred'];
$hundred=$_POST['hundred'];
$fifty=$_POST['fifty'];
$amount=$_POST['amount'];
$denomination_total=$twok*2000+$onek*1000+$fivehundred*500+$hundred*100+$fifty*50;
$balance = 0;
$atm_cash = 0;
$card_no=0;
$op_id=1;
date_default_timezone_set("Asia/Calcutta");
$date = date('Y-m-d H:i:s');

//Fetching Account Balance
$resultAmount = mysqli_query($conn, "SELECT balance FROM accounts where customer_id=1");
if(!$resultAmount){
	die(mysqli_error($conn));
}

if (mysqli_num_rows($resultAmount) > 0) {
	while($rowData = mysqli_fetch_array($resultAmount)){
        $balance=$rowData["balance"];
	}
}

//Fetching Amount of Cash Available in ATM
$resultAtm = mysqli_query($conn, "SELECT total_balance FROM atm_denominations where atm_no=1");
if(!$resultAtm){
	die(mysqli_error($conn));
}

if (mysqli_num_rows($resultAtm) > 0) {
	while($rowData = mysqli_fetch_array($resultAtm)){
        $atm_cash=$rowData["total_balance"];
	}
}

//Fetching the card number
$resultCardNo = mysqli_query($conn, "SELECT card_number FROM accounts where customer_id=1");
if(!$resultCardNo){
	die(mysqli_error($conn));
}

if (mysqli_num_rows($resultCardNo) > 0) {
	while($rowData = mysqli_fetch_array($resultCardNo)){
        $card_no=$rowData["card_number"];
	}
}

//&& $balance>=$denomination_total && $atm_cash>=$denomination_total

if ( $balance>=$denomination_total && $atm_cash>=$denomination_total ) {
    //echo "Record updated successfully";
$query_match = "UPDATE atm_denominations SET fifty = fifty-$fifty,hundred=hundred-$hundred,fivehundred=fivehundred-$fivehundred,
onethousand=onethousand-$onek,twothousand=twothousand-$twok,total_balance=
total_balance-$denomination_total WHERE atm_no=1";
$query_bal = "UPDATE accounts SET balance = balance-$amount WHERE customer_id=1";
$query_transaction="INSERT INTO transaction (atm_no,card_number,op_id,amount,trans_time,transaction_status) VALUES ('1','$card_no','$op_id','$amount','$date','1')";
mysqli_query($conn,$query_transaction);
mysqli_query($conn,$query_match);
mysqli_query($conn,$query_bal);

header('Location: http://localhost/atm_system/collect_cash.html');
}
elseif($balance<$denomination_total) {
    header('Location: http://localhost/atm_system/withdraw_error_balance.html');
}
elseif($atm_cash<$denomination_total) {
 
header('Location: http://localhost/atm_system/withdraw_error_atm.html');
}
//mysqli_close($conn);


?> 
