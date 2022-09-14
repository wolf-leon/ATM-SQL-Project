<?php 
session_start();
?>

<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="t_atmdb"; // Database name
$tbl_name="accounts"; // Table name

// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

if (array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1)){
    
  
    if($_SESSION['counter']>3)
  
    {  $query = "UPDATE 'card' SET `card_stat`=0 WHERE `card_number`=' $_SESSION[fname]';";
  
       $results = mysqli_query($db, $query);
  
       if (!$results || mysqli_num_rows($results) == 0) {
        error_log("Error occurred as customer three attempts were made to transfer funds");
        header("location: perror.html");
  
       }
  
      session_destroy();
    }
  } 

	
	$errors=array();

    date_default_timezone_set("Asia/Calcutta");
    $date = date('Y-m-d H:i:s'); 
    $_SESSION['date']=$date;
 

	// verifying card number
	if (isset($_POST['submit'])) {
		
		$card_no = mysqli_real_escape_string($db, $_POST['card_no']);
        $amount = mysqli_real_escape_string($db,$_POST['amount']);

		//error message if the input field is left blank
		if (empty($card_no)) {
			
			array_push($errors, "Card Number Required"); 
            error_log("Error occurred as customer did not enter recipient's card number while transferring funds");

		}
        if (empty($amount)) {
    
            array_push($errors, "Amount Required"); 
            error_log("Error occurred as customer did not enter amount while transferring funds");
        
          }
          
		if (count($errors) == 0) {
		//checking for the errors
			$query = "SELECT * FROM accounts WHERE card_number='$card_no';";
			$results = mysqli_query($db, $query);

            

			// $results = 1 means that one user with the entered Card Number exists
		if (mysqli_num_rows($results) == 1) {
			//get current balance amount of the customer's account
		$resultAmount = mysqli_query($db, "SELECT balance FROM accounts WHERE card_number=' $_SESSION[fname]';");
        if(!$resultAmount){
            die(mysqli_error($db));
        }
        if (mysqli_num_rows($resultAmount) > 0) {
        while($rowData = mysqli_fetch_array($resultAmount)){
            $balance=$rowData["balance"];
        }
    }

    if($balance > $amount){
            //deduct from account
            $update_from = "UPDATE accounts SET balance = balance - $amount WHERE card_number= '$_SESSION[fname]';";
            mysqli_query($db,$update_from);
            
            //add to receipients acc
            $update_to = "UPDATE accounts SET balance = balance + $amount WHERE card_number= $card_no";  
            mysqli_query($db,$update_to);

            //inserting log in transaction table
            $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES (' $_SESSION[fname]','2','$amount','$date','1')"; 
            mysqli_query($db,$query_transaction);
            header('location: transfer_receipt.php'); 
            
        } else{          
			array_push($errors, "Insufficient amount to make transfer"); 
            $query_transaction="INSERT INTO transactions (card_number,operation,amount,transaction_time,transaction_status) VALUES (' $_SESSION[fname]','2','$amount','$date','0')"; 
            mysqli_query($db,$query_transaction);
            header('location: transfer_error.html'); 	
		} 	          
			
		}else {
            array_push($errors, "Card Number doesnt exist or Has been blocked.Please Contact the bank"); 
            //if the Card Number doesn't match
		}
    }
} 
?>