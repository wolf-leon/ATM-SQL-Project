<?php
session_start();
$_SESSION['counter']=0;

?>

<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="t_atmdb"; // Database name
$tbl_name="accounts"; // Table name

// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

//Operation ID for Withdrawal
$op_id=1;
date_default_timezone_set("Asia/Calcutta");
$date = date('Y-m-d H:i:s');
$_SESSION['date']=$date;
$errors=array();

if (isset($_POST['submit'])) {
    //data sanitization to prevent SQL injection
    $amount = mysqli_real_escape_string($db, $_POST['amount']);
    $twok = mysqli_real_escape_string($db,$_POST['twok']);
    $onek = mysqli_real_escape_string($db, $_POST['onek']);
    $fivehundred = mysqli_real_escape_string($db,$_POST['fivehundred']);
    $hundred = mysqli_real_escape_string($db, $_POST['hundred']);
    $fifty = mysqli_real_escape_string($db,$_POST['fifty']);

      if (count($errors) == 0) 
      {
// Query to get user balance
        $select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
        $result= mysqli_query($db, $select_query) or die(mysqli_error($db));
        $balance=mysqli_fetch_array(($result));
        
        //Fetching Amount of Cash Available in ATM
        $aselect_query="SELECT total_balance FROM denomination";
        $aresult= mysqli_query($db, $aselect_query) or die(mysqli_error($db));
        $atm_cash=mysqli_fetch_array(($aresult));
        
$denomination_total=$twok*2000+$onek*1000+$fivehundred*500+$hundred*100+$fifty*50;
$b=$balance[0];
$a=$atm_cash[0];


if($amount!=$denomination_total)
{
    array_push($errors, "Amount Does not Match Denomination"); 
    return false;
}
else if (($b)>=$amount && ($a)>=$amount ) {
    //echo "Record updated successfully";
$query_match = "UPDATE denomination SET fifty = fifty-$fifty,hundred=hundred-$hundred,fivehundred=fivehundred-$fivehundred,
onethousand=onethousand-$onek,twothousand=twothousand-$twok,total_balance=
total_balance-$amount";
$query_bal = "UPDATE accounts SET balance = balance-$amount WHERE card_number='$_SESSION[fname]'";
$query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','$amount','$date','1')";
mysqli_query($db,$query_transaction);
mysqli_query($db,$query_match);
mysqli_query($db,$query_bal);
header('Location:collect_cash.html');
}
else if(($b)<$denomination_total) {
    $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','0','$date','0')";
	mysqli_query($db,$query_transaction);
    array_push($errors, "Insufficient Balance in Your Account"); 
	return false;
}
else if($a<$denomination_total) {
    $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','$op_id','$0','$date','0')";
	mysqli_query($db,$query_transaction);
    array_push($errors,"Insufficient Cash in the ATM");
}    return false;

}
}
?> 
