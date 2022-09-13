<<<<<<< HEAD
=======
<?php include('server.php') ?>

>>>>>>> fbe1c84f7b63358e0fd5c63b022f9ec36d0345d3
<?php 
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="abc"; // Database name
$tbl_name="accounts"; // Table name

<<<<<<< HEAD

=======
>>>>>>> fbe1c84f7b63358e0fd5c63b022f9ec36d0345d3
// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");

session_start();

$select_query="SELECT balance FROM $tbl_name WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($db, $select_query) or die(mysqli_error($db));

<<<<<<< HEAD

$res=mysqli_fetch_array(($result));


?>

<!DOCTYPE html>

=======
$res=mysqli_fetch_array(($result));

?>

<!DOCTYPE html>
>>>>>>> fbe1c84f7b63358e0fd5c63b022f9ec36d0345d3
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="" type="">
  <link rel="stylesheet" href="style.css">

  <!-- title -->
        <title>ABC Bank</title>

        <!-- bootstrap cdn link -->
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>


    <body style="background:linear-gradient(#ffb6c1,#ADD8E6);background-attachment:fixed">
       <!-- auth page code here -->
      
      <div class="x">
        <img src="images\bank logo.png" alt="bank logo" style="width:150px;height:100px;";>
      </div> 

      <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
      <img src="images\card.png" alt="bankbg" style="width:550px;height:550px;">
        </div>

        <div class="col col-lg-6 text-center mx-auto">
<div class=" text-center" style="margin-top: 80px;">   
    
    <div class="mx-auto text-center m" >
    <p style="font-weight: bold;font-size: 60px;" >Available Balance:</p>
<<<<<<< HEAD
    <?php echo'<p style="font-weight: bold;font-size: 60px;" >'.$res['balance'].'</p>';?>

    </div>
    <div class="mx-auto text-center" >
     
      <br>
     

        
=======
    <?php echo'<style="font-weight: bold;font-size: 30px;" >'.$res['balance'].'</style>';?>
    </div>
    <div class="mx-auto text-center" >
           
    <form action="auth.php" method="post" >
>>>>>>> fbe1c84f7b63358e0fd5c63b022f9ec36d0345d3
        <p style="font-weight: bold;font-size: 40px;" >Do you want a Receipt? </p>
        <div class="text-center" style="margin-bottom: 20px;">
            <a href="balance_receipt.php">
            <button type="button" class="rounded-pill btn btn-primary g">YES</button>
            </a>
		</div>
		<div class="text-center" style="margin-bottom: 20px;">
            <a href="end.html">
            <button type="button" class="rounded-pill btn btn-primary g">NO</button>
            </a>
		</div>
    </form>
</div>
</div>
        </div>

      </div>

            


       <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>