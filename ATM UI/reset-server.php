<?php session_start();?>
<?php

  $host = "localhost"; // Host name
  $username = "root"; // Mysql username
  $password = ""; // Mysql password
  $db_name = "f_atmdb"; // Database name
  $tbl_name = "card"; // Table name

  // Connect to server and select database.
  $db = mysqli_connect("$host", "$username", "$password", "$db_name") or die("cannot connect");
  $errors = array();

  if (isset($_POST['submit'])) 
  {
    $oldpin = mysqli_real_escape_string($db, $_POST['oldpin']);
    $newpin = mysqli_real_escape_string($db, $_POST['newpin']);
    $repin = mysqli_real_escape_string($db, $_POST['repin']);
   // $number = preg_match('@[0-9]@', $newpin, $oldpin);
    
    if (empty($oldpin)) {
      array_push($errors, "PIN Required");
    }
    if (empty($newpin)) {
    array_push($errors, " New PIN Required");
  }
  if (empty($repin)) {

    array_push($errors, "Re-enter PIN");

  }
  if (count($errors) == 0 && $newpin == $repin) 
  {
    

    $query = ("UPDATE $tbl_name SET `pin`= $newpin WHERE `pin`=$oldpin");
    $results = mysqli_query($db, $query);
    if ($results) {
      echo "<script>alert('Pin has been succesfully reset');</script>";
      //echo ($_SESSION['success']);
      //echo "<script> window.alert('Pin has been reset succesfully') </script>";
    include 'end.html'; //page on which the user is sent to after logging in
    }
  }
else {
  array_push($errors, "Entered pins do not match");
  echo ("");
}
}
?>