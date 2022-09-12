<?php include('server.php') ?>

<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$pin=$_SESSION['Pin'];
$select_query="select a.card_no, b.name ,b.balance,c.balance
    from user a, account b,card c
    where a.user_id=b.user_id and
    b.user_id=c.user_id and
    a.user_id=c.user_id and 
    c.card_pin=$pin;";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row= mysqli_fetch_array($select_query_result);
?>

<!DOCTYPE html>

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
    </div>
    <div class="mx-auto text-center" >

    <div class="container">
     <div class="row">
         <h7><br><Br><Br <b><div class="col-xs-2">Card Number: </div>
                        <div class="col-xs-10"><?php echo $row['card_no']; ?> </div><br><br></b></h7><br>
            </div>
            <div class="row">
                <h7> <b><div class="col-xs-2">Name: </div>
                        <div class="col-xs-10"><?php echo $row['name']; ?> </div><br><br></b></h7><br>
            </div>
    <div class="row">
          
                        <h7> <b><div class="col-xs-2">Available Balance:  </div>
                                <div class="col-xs-10"><?php echo $row['balance']; ?></div></b><br><br></h7><br>
                    
            </div>
            <div class="row">
                <h7> <b><div class="col-xs-2">Balance: </div>
                        <div class="col-xs-10"><?php echo $row['balance']; ?> </div><br><br></b></h7> </h7>
        </div>
    <a href="index.php" class="button">Exit</a>
</div>
    <form action="auth.php" method="post" >
     
      <?php include('errors.php') ?>
      <br>
     <div class="text-center" style="margin-bottom:20px;">
        <input type="text" id="fname" name="fname" placeholder=" Balance" ><br>
     </div>

        
        <p style="font-weight: bold;font-size: 40px;" >Do you want a Receipt? </p>
        <div class="text-center" style="margin-bottom: 20px;">
            <a href="balance_receipt.html">
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