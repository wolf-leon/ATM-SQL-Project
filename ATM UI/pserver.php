<?php 
session_start();
<<<<<<< HEAD
if(isset($_POST['pbutton'])){

    array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1);

    echo $_SESSION['counter'];

    if($_SESSION['counter']>2)

    {

      header("location: index.html");

      session_destroy();

 

    }

   

=======
//form counter
if(isset($_POST['pbutton'])){
	array_key_exists('counter', $_SESSION) ? $_SESSION['counter']++ : ($_SESSION['counter'] =1);
	echo $_SESSION['counter'];
	if($_SESSION['counter']>2)
	{
	  header("location: service.html");
	  session_destroy();
  
	}
	
>>>>>>> 351dd9bbae69b8c6dcf7de2d2a3ebe17c3d509e3
  }
?>
<?php 
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="abc"; // Database name
$tbl_name="card"; // Table name


// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
$errors=array();
$c=0;

if (isset($_POST['pbutton'])) {
  //data sanitization to prevent SQL injection
  $pname = mysqli_real_escape_string($db, $_POST['pname']);

  //error message if the input field is left blank
  if (empty($pname)) {
    
    array_push($errors, "PIN Required"); 

  }
  if (count($errors) == 0) {
  //checking for the errors
    $query = "SELECT * FROM $tbl_name WHERE pin='$pname' AND card_num='$_SESSION[fname]';";
    $results = mysqli_query($db, $query);

    // $results = 1 means that one user with the entered Card Number exists
    if (mysqli_num_rows($results) == 1 and $c<=3 ) {
      // Welcome message
      $_SESSION['success'] = "You have logged in!";
      header('location: options.html'); //page on which the user is sent to after logging in
    }
    else {
           
                array_push($errors, "Incorrect PIN. Try Again."); 

          
    }
  }
}
            
?>
