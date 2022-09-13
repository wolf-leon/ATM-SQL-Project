<?php 
include("config.php");

session_start();

$select_query="SELECT transaction_id FROM transactions WHERE card_number='$_SESSION[fname]';";
$trans= mysqli_query($db, $select_query) or die(mysqli_error($db));

$t=mysqli_fetch_array(($trans));

$select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($db, $select_query) or die(mysqli_error($db));

$res=mysqli_fetch_array(($result));


$select_query="SELECT card_number FROM accounts WHERE card_number='$_SESSION[fname]';";
$num= mysqli_query($db, $select_query) or die(mysqli_error($db));

$cardnum=mysqli_fetch_array(($num));



?>
<!DOCTYPE html>
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


    <body style="background:linear-gradient(#f28e7e,#d9ebcc); background-attachment: fixed;">
       <!-- auth page code here -->
      
      <div class="x">
        <img src="images\bank logo.png" alt="bank logo" style="width:150px;height:100px;";>
      </div> 

      <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
      <img src="images\receipt.png" alt="bankbg" style="width:520px;height:550px;">
        </div>

        <div class="col col-lg-6 text-center mx-auto">
<div class=" text-center" style="margin-top: 80px;">   

    <div class="box">
        <style type="text/css">
            .box {
              border: 5px solid black ;
              width: 450px;
              height: 400px;
            }
            </style>
    <div class="mx-15 text-center m" >
        
    <p style="font-weight: bold;font-size: 50px;" ><u>RECEIPT</u></p>
	<p style="font-size: 20px;" ><b>ATM Transaction Id:</b>
    <?php echo'<style="font-weight: bold;font-size: 20px;" >'.$t['transaction_id'].'</style>';?></p>
    <p style="font-size: 20px;" ><b>Card Number :</b> 
    <?php echo'<style="font-weight: bold;font-size: 20px;" >'.$cardnum['card_number'].'</style>';?></p> 
    <p style="font-size: 30px;" ><b>Available Balance: </b>
    <?php echo'<style="font-weight: bold;font-size: 30px;" >'.$res['balance'].'</style>';?>
    </div>
    </div>>

        <div class="text-center " style="margin-bottom: 20px;">
            <a href="collect_receipt.html">
			<input type="submit" value="Print Recipt" class="rounded-pill btn btn-primary g">
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
