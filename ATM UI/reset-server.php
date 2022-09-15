<?php session_start();
          $_SESSION['counter']=0;

    include("config.php");?>
    <?php
    //PIN counter for Old Pin field
    if (array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1)){
      echo $_SESSION['counter'];
      if($_SESSION['counter']>3)
      {  $query = "UPDATE 'card' SET `card_stat`=0 WHERE `card_number`=' $_SESSION[fname]';";
        $results = mysqli_query($db, $query);
        if (!$results || mysqli_num_rows($results) == 0) {
          error_log("Error occurred as customer three attempts were made to transfer funds");
          header("location: perror.html");
        }
        else{
          $_SESSION['counter']=0;
         }
        session_destroy();
      }
    }

      $errors = array();
      if (isset($_POST['submit']))
      {
        $oldpin = mysqli_real_escape_string($db, $_POST['oldpin']);
        $newpin = mysqli_real_escape_string($db, $_POST['newpin']);
        $repin = mysqli_real_escape_string($db, $_POST['repin']);
    
      if (empty($oldpin)) {
        error_log("Old pin field empty");

          array_push($errors, "PIN Required");
      }
      if (empty($newpin)) {
        error_log("New pin field empty");

        array_push($errors, " New PIN Required");
      }
      if (empty($repin)) {
        error_log("Re-New pin field empty");

        array_push($errors, "Re-enter PIN");
      }
    //validating pin
    $query = "SELECT * FROM card WHERE pin='$oldpin' AND card_number='$_SESSION[fname]';";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results)==1){
      if (count($errors) == 0 && $newpin == $repin)
      {
        $query = ("UPDATE card SET `pin`= $newpin WHERE `pin`=$oldpin");
        $results = mysqli_query($db, $query);
        //PIN Confirmation dialog box
        if ($results) {
          echo "<script>
          {
            alert('Pin was reset');
          }
          </script>";
          include 'end.html';
        }
        else{
          echo "<script>
          {
            alert('Pin was not reset');
          }
          </script>";
        }
      }
    else {
      error_log("Entered pins do not match");

      array_push($errors, "Entered pins do not match");
    }
    } else{
      error_log("Old pin is invalid");

      array_push($errors, "Old PIN Invalid");
    }
      }
    ?>