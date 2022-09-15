<?php include('transfer_server.php') ?>
<!DOCTYPE html>
<html>
<a href="options.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left; padding: 2px;">arrow_back</i></a>    

<a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">home</i></a>
<div data-include="test.html"></div>    <script src="csi.min.js"> </script>


    <body style="background:linear-gradient(#D5F7E6, #63DFA8); background-attachment:fixed;">
       <!-- transfer of funds page code here -->
       
      <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
      <img src="images\fund_transfer1.png" alt="fund_img" style="width:500px;height:500px;  margin-left: 50px;">
        </div>
        <div class="col col-lg-6 text-center mx-auto">
         <div class=" text-center" style="margin-top: 80px;"> 
            <div class="mx-auto text-center m" ></div>
    <div class="mx-auto text-center" >
    <form action="transfers.php" method="post" >

        <?php include('errors.php') ?>

    <p style="font-weight: bold;font-size: 60px;" > Transfer Funds </p>
    <div class="text-center" style="margin-bottom:20px;">
      <label>Card Number:</label>
        <input type="text" id="card_no" name="card_no" placeholder=" Enter Card Number" required><br>
     </div>
     <div class="text-center" style="margin-bottom:50px;">
      <label>Amount:</label>
        <input type="text" id="amt" name="amount" placeholder=" Enter Amount "><br>
      </div>
        <div class="text-center" style="margin-bottom: 20px;">
            <input type="submit" value="Submit" name="submit" onclick="return confirm('Are you sure?')" class="rounded-pill btn btn-primary g">
        </div>
        <div class="text-center" style="margin-bottom: 20px;">
          <input type="reset" value="Clear" class="rounded-pill btn btn-primary g">
      </div>
    </form>
</div>
</div>
        </div>
      </div>
       <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- //Confirmation dialog box for transaction. -->
<script>
  function confirmTransaction(delUrl){
    if(confirm("Are you sure?")){
      document.location =delUrl;
    } else{
      document.location="transfer_error.html";
    }
  }
</script>
    </body>
</html>