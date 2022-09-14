<?php 
session_start();
include("config.php");
?>

<?php


	// declaring and hoisting the variables
	//$fname=$_POST['fname'];
	$errors=array();
 

	// user login
	if (isset($_POST['cbutton'])) {
		//data sanitization to prevent SQL injection
		$fname = mysqli_real_escape_string($db, $_POST['fname']);

		//error message if the input field is left blank
		if (empty($fname)) {
			
			array_push($errors, "Card Number Required"); 

		}
		if (count($errors) == 0) {
		//checking for the errors
			$query = "SELECT * FROM card WHERE card_number='$fname';";
			$results = mysqli_query($db, $query);

			// $results = 1 means that one user with the entered Card Number exists
			if (mysqli_num_rows($results) == 1) {
				// Storing username in session variable
				$_SESSION['fname'] = $fname;

				
             
				// Welcome message
				$_SESSION['success'] = "You have logged in!";
				header('location: pin.php'); //page on which the user is sent to after logging in
			}
			
			else {
				array_push($errors, "Card Number doesnt exist or Has been blocked.Please Contact the bank"); 
				//if the Card Number doesn't match
			}
		}
	}



	//PIN Verfication
	

?>