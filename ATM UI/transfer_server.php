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
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

	
	$errors=array();
   
 

	// verifying card number
	if (isset($_POST['submit'])) {
		//data sanitization to prevent SQL injection
		$card_no = mysqli_real_escape_string($db, $_POST['card_no']);
        $amount = mysqli_real_escape_string($db,$_POST['amount']);

		//error message if the input field is left blank
		if (empty($card_no)) {
			
			array_push($errors, "Card Number Required"); 

		}
        if (empty($amount)) {
    
            array_push($errors, "Amount Required"); 
        
          }
          
		if (count($errors) == 0) {
		//checking for the errors
			$query = "SELECT * FROM $tbl_name WHERE card_number='$card_no';";
			$results = mysqli_query($db, $query);

            

			// $results = 1 means that one user with the entered Card Number exists
			if (mysqli_num_rows($results) == 1) {
				//get current balance amount of the customer's account
		$resultAmount = mysqli_query($db, "SELECT balance FROM $tbl_name WHERE card_number='$_SESSION[fname]';");
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
            $update_from = "UPDATE $tbl_name SET balance = $balance - $amount WHERE card_number= '$_SESSION[fname]';";
            $result1=mysqli_query($db,$update_from);
            if(!$result1 || mysqli_num_rows($result1)==0){
                //Transaction complete
                $_SESSION['success'] = "Transaction successful";
                header('location: options.html'); //page on which the user is sent to after logging in
                                
            }
            else{
                array_push($errors,"Transaction failed");
                echo("");
            }
            //add to receipients acc
            $update_to = "UPDATE $tbl_name SET balance = $balance + $amount WHERE card_number= $card_no";  
            $result2=mysqli_query($db,$update_to);
            if(!$result2 || mysqli_num_rows($result2)==0){
                $_SESSION['success'] = "Transaction successful";
                header('location: transfer_receipt.html');  //page on which the user is sent to after logging in                
            }
            else{
                array_push($errors,"Transaction failed");
                echo("");
            }
        } else{          
			array_push($errors, "Insufficient amount to make transfer"); 
			return false;
		
		} 	          
			
		}else {
            array_push($errors, "Card Number doesnt exist or Has been blocked.Please Contact the bank"); 
            //if the Card Number doesn't match
			}
        
        
        if (array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1)){
    
          echo $_SESSION['counter'];
        
          if($_SESSION['counter']>2)
        
          {  $query = "UPDATE 'card' SET `card_stat`=0 WHERE `card_number`='$_SESSION[fname]';";
        
             $results = mysqli_query($db, $query);
        
             if (!$results || mysqli_num_rows($results) == 0) {
        
            header("location: perror.html");
        
             }
        
            session_destroy();
          }
        } 

		}

		
	} 
?>