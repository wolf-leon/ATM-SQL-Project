<?php
include('config.php');
// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
session_start();
$select_query="SELECT transaction_id FROM transactions ORDER BY transaction_id DESC LIMIT 1";
$trans= mysqli_query($db, $select_query) or die(mysqli_error($db));
$t=mysqli_fetch_array(($trans));
$select_query="SELECT card_number FROM accounts WHERE card_number='$_SESSION[fname]';";
$num= mysqli_query($db, $select_query) or die(mysqli_error($db));
$cardnum=mysqli_fetch_array(($num));
$select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($db, $select_query) or die(mysqli_error($db));
$res=mysqli_fetch_array(($result));
$select_query="SELECT amount FROM transactions ORDER BY transaction_id DESC LIMIT 1";
$resul= mysqli_query($db, $select_query) or die(mysqli_error($db));
$amt=mysqli_fetch_array(($resul));
?>
<!DOCTYPE html>
<html>
    
    <body style="background:linear-gradient(#f28e7e,#d9ebcc); background-attachment: fixed;">
       <!-- auth page code here -->
       <div data-include="test.html"></div>    <script src="csi.min.js"> </script>

      <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
           <img src="images\receipt.png" alt="bankbg" style="width:520px;height:550px;">
        </div>
        <div class="col col-lg-6 text-center mx-auto">
        <div class=" text-center" style="margin-top: 80px;">  
           <div class="box text-center mx-auto">
            <style type="text/css">
            .box {
              border: 5px solid black ;
              width: 450px;
              height: 400px;
            }
            </style>
            <div class="mx-15 text-center m" >
            <p style="font-weight: bold;font-size: 50px;" ><u>Fund Transfer Receipt</u></p>
            <p style="font-size: 20px;" ><b>Date:</b>
            <?php echo'<style="font-weight: bold;font-size: 20px;">'.$_SESSION['date'].'</style>';?></p>
            <p style="font-size: 20px;" ><b>ATM Transaction Id:</b>
            <?php echo'<style="font-weight: bold;font-size: 20px;">'.$t['transaction_id'].'</style>';?></p>
            <p style="font-size: 20px;" ><b>Card Number :</b>
            <?php echo'<style="font-weight: bold;font-size: 20px;">'.$cardnum['card_number'].'</style>';?></p>
            <p style="font-size: 20px;" ><b>Transferred Amount :</b>
            <?php echo'<style="font-weight: bold;font-size: 20px;">'.$amt['amount'].'</style>';?></p>  
            <p style="font-size: 20px;" ><b>Available Balance: </b></p>
            <?php echo'<style="font-weight: bold;font-size: 20px;">'.$res['balance'].'</style>';?>
            </div>
           </div>
           <div class="text-center " style="margin-bottom: 20px;"><br>
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