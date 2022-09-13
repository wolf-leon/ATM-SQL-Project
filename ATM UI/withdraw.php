<?php include ('w_server.php') ?>
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>


    <body style="background:linear-gradient(#b289e1,#ADD8E6);background-attachment: fixed;">
       <!--  withdraw code here -->
       <a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">home</i></a>
       <a href="options.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">list</i></a>
       
     

      <div class="x">
        <img src="images\bank logo.png" alt="bank logo" style="width:150px;height:100px;";>
      </div> 

      <div class="row mx-auto">
        <div class="col col-lg-4 text-center">
      <img src="images\withdraw.png" alt="fund_img" style="width:500px;height:500px;  margin-left: 50px;">
        </div>

        <div class="col col-lg-8 text-center mx-auto">
         <div class=" text-center" style="margin-top:0px;"> 
            <div class="mx-auto text-center m" ></div>
    <div class="mx-auto text-center" >
    <form action="withdraw_server.php" method="post" class="text-center">

        <h4><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Enter the amount</b></h4>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<input type="number" id="amount" name="amount" ><br><br>
        <h4 ><b>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Enter the number of notes for the following denominations</b></h4>
        <label for="twok"><b>2000</b></label>
        <input type="number" name="twok" id="twok"  ><br><br>
        <label for="onek"><b>1000</b></label>
        <input type="number" name="onek" id="onek" ><br><br>
        <label for="fivehundred"><b>500</b></label>
        <input type="number" name="fivehundred" id="fivehundred" ><br><br>
        <label for="hundred"><b>100</b></label>
        <input type="number" name="hundred" id="hundred" ><br><br>
        <label for="fifty"><b>50</b></label>
        <input type="number" name="fifty" id="fifty" ><br><br>
        <span id="error"></span>
        <br>
        <div  style="margin-bottom: 20px;">
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" value="Submit" onclick="return errorMessage()" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
        <input type="reset" value="Reset" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
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
