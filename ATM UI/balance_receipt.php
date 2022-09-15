<?php 
include("config.php");

session_start();

// to display latest transaction id
$select_query="SELECT transaction_id FROM transactions where card_number='$_SESSION[fname]' ORDER BY transaction_id DESC LIMIT 1 ;";


$trans= mysqli_query($db, $select_query) or die(mysqli_error($db));

$t=mysqli_fetch_array(($trans));

//to display Balance
$select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($db, $select_query) or die(mysqli_error($db));

$res=mysqli_fetch_array(($result));

//to display Card Number
$select_query="SELECT card_number FROM accounts WHERE card_number='$_SESSION[fname]';";
$num= mysqli_query($db, $select_query) or die(mysqli_error($db));
$cardnum=mysqli_fetch_array(($num));

//to display Transaction Time
$select_query="SELECT transaction_time FROM transactions WHERE card_number='$_SESSION[fname]';";
$date= mysqli_query($db, $select_query) or die(mysqli_error($db));
$date=mysqli_fetch_array(($date));

?>
<!DOCTYPE html>
<body style="background:linear-gradient(#EE9CA7,
#FFDDE1); height: 100vh; background-attachment: fixed;">

<div data-include="test.html"></div>

    <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
            <img src="images\receipt.png" alt="bankbg" style="width:500px;height:5o0px;">
        </div>

        <div class="col col-lg-6 text-center mx-auto">
            <div class=" text-center" style="margin-top: 20px;">

                <div class="box">
                    <style type="text/css">
                    .box {
                        border: 5px solid black;
                        width: 350px;
                        height: 350px;
                    }
                    </style>
                    <div class="mx-15 text-center m">

                        <p style="font-weight: bold;font-size: 50px;"><u>RECEIPT</u></p>
                        <p style="font-size: 30px;"><b>Date: </b>
                            <?php echo'<style="font-weight: bold;font-size: 30px;" >'.$date['transaction_time'].'</style>';?>
                        <p style="font-size: 20px;"><b>ATM Transaction Id:</b>
                            <?php echo'<style="font-weight: bold;font-size: 20px;" >'.$t['transaction_id'].'</style>';?>
                        </p>
                        <p style="font-size: 20px;"><b>Card Number :</b>
                            <?php echo'<style="font-weight: bold;font-size: 20px;" >'.$cardnum['card_number'].'</style>';?>
                        </p>
                        <p style="font-size: 30px;"><b>Available Balance: </b>
                            <?php echo'<style="font-weight: bold;font-size: 30px;" >'.$res['balance'].'</style>';?>
                            
                    </div>
                </div>>

                <div style="margin-bottom: 5px;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script> <script src="csi.min.js"> </script>

</body>

</html>