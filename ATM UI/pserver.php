<?php 
session_start();
$_SESSION['counter']=0;

include("config.php");
$errors=array();
if (isset($_POST['pbutton'])) {
  //data sanitization to prevent SQL injection
  $pname = mysqli_real_escape_string($db, $_POST['pname']);
  //error message if the input field is left blank
  if (empty($pname)) {
    array_push($errors, "PIN Required"); 
  }
    //checking for the errors
  if (count($errors) == 0) {
    $query = "SELECT * FROM card WHERE pin='$pname' AND card_number='$_SESSION[fname]';";
    $results = mysqli_query($db, $query);

    // $results = 1 means that one user with the entered Card Number exists
    if (mysqli_num_rows($results) == 1  ) {

//Card expiry code
$query = "SELECT * FROM card WHERE expiry_date >=now() and card_number='$_SESSION[fname]';";
$eresults = mysqli_query($db,$query);
if (mysqli_num_rows($eresults) == 1  ) {
  $_SESSION['success'] = "You have logged in!";
  header('location: options.html');
}
else{
  error_log("Card is expired.");
  array_push($errors, "Your card is expired. "); 
  $squery = "UPDATE card SET `card_status`=3 WHERE `card_number`='$_SESSION[fname]';";
  $results = mysqli_query($db, $squery);
}
}
//Pin counter code
    else{
    array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1);
      echo $_SESSION['counter'];
      if($_SESSION['counter']>2)
      {  $query = "UPDATE card SET `card_status`=2 WHERE `card_number`='$_SESSION[fname]';";
         $results = mysqli_query($db, $query);
         if (!$results || mysqli_num_rows($results) == 0) {
        error_log("Card is blocked. PIN tried more than 3 times.");
        header("location: perror.html");


         }
        
        session_destroy();
      }
    }
  }
}
?>