<?php 
include("config.php");
session_start();

$operation_id=3;
//to display Balance
$select_query="SELECT balance FROM accounts WHERE card_number='$_SESSION[fname]';";
$result= mysqli_query($db, $select_query) or die(mysqli_error($db));
$res=mysqli_fetch_array(($result));

date_default_timezone_set("Asia/Calcutta");

    $date = date('Y-m-d H:i:s');

    $_SESSION['date']=$date;

$select_query="INSERT INTO transactions(card_number,operation,amount,transaction_time,transaction_status) VALUES ('$_SESSION[fname]','3','0','$date','1')";
$logg= mysqli_query($db, $select_query) or die(mysqli_error($db));
//$update_bal=mysqli_fetch_array(($logg));

?>
<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body style="background:linear-gradient(#8fd8d9, #9ee2b4); height: 100vh; background-attachment: fixed;">
<a href="options.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">arrow_back</i></a>

<a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">home</i></a> 
<div data-include="test.html"></div>
<div class="row mx-auto">
    <div class="col col-lg-6 text-center">
        <img src="images\card.png" alt="bankbg" style="width:500px;height:500px;">
    </div>
    <div class="col col-lg-6 text-center mx-auto">
        <div class=" text-center" style="margin-top: 80px;">
            <div class="mx-auto text-center m">
                <p style="font-weight: bold;font-size: 50px;">Available Balance:</p>
                <?php echo'<p style="font-weight: bold;font-size: 60px;" >'.$res['balance'].'</p>'; ?>
                <a href="btable.php">
                    <p style="font-size: 20px;">View Recent Transactions </p>
                </a>
            </div>
            <div class="mx-auto text-center">
                <br>
                <p style="font-weight: bold;font-size: 35px;">Do you want a Receipt? </p>
                <a href="balance_receipt.php">
                    <button type="button" style="width:100px;height:50px ; margin-right: 12px;" class="rounded-pill btn btn-primary g">YES</button>
                </a>
                <a href="end.html">
                    <button type="button" style="width:100px;height:50px;" class="rounded-pill btn btn-primary g">NO</button>
                </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="csi.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
</body>
</html>