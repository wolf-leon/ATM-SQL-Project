<?php 
	session_start(); // starting the session, necessary for using session variables
     
$host=""; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name=""; // Database name
$tbl_name=""; // Table name

// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

	// declaring and hoisting the variables
	$fname=$_GET['fname'];
	$errors = array(); 

	// user login
	if (isset($_POST['#button name'])) {
		//data sanitization to prevent SQL injection
		$fname = mysqli_real_escape_string($db, $_POST['fname']);

		//error message if the input field is left blank
		if (empty($fname)) {
			array_push($errors, "Card number is required");
		}
		
		//checking for the errors
		if (count($errors) == 0) {
			$query = "SELECT * FROM $tbl_name WHERE cardnumber='$fname' ";
			$results = mysqli_query($db, $query);

			// $results = 1 means that one user with the entered username exists
			if (mysqli_num_rows($results) == 1) {
				
				header('location: Cardpin.php'); //page on which the user is sent to after logging in
			}else {
				array_push($errors, "Card Number is incorrect"); 
				//if the username and password doesn't match
			}
		}
	}

?>