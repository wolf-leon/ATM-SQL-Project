<?php include('withdraw_server.php')?>
<?php
$resultAmount = mysqli_query($db,"SELECT twothousand FROM denomination where atm_no='1'");
if(!$resultAmount){
    die(mysqli_error($db));
}
if (mysqli_num_rows($resultAmount) > 0) {
while($rowData = mysqli_fetch_array($resultAmount)){
    $twok=$rowData["twothousand"];
}
}

$resultAmount = mysqli_query($db,"SELECT onethousand FROM denomination where atm_no='1'");
if(!$resultAmount){
    die(mysqli_error($db));
}
if (mysqli_num_rows($resultAmount) > 0) {
while($rowData = mysqli_fetch_array($resultAmount)){
    $onek=$rowData["onethousand"];
}
}

$resultAmount = mysqli_query($db,"SELECT fivehundred FROM denomination where atm_no='1'");
if(!$resultAmount){
    die(mysqli_error($db));
}
if (mysqli_num_rows($resultAmount) > 0) {
while($rowData = mysqli_fetch_array($resultAmount)){
    $fivehundred=$rowData["fivehundred"];
}
}

$resultAmount = mysqli_query($db,"SELECT hundred FROM denomination where atm_no='1'");
if(!$resultAmount){
    die(mysqli_error($db));
}
if (mysqli_num_rows($resultAmount) > 0) {
while($rowData = mysqli_fetch_array($resultAmount)){
    $hundred=$rowData["hundred"];
}
}

$resultAmount = mysqli_query($db,"SELECT fifty FROM denomination where atm_no='1'");
if(!$resultAmount){
    die(mysqli_error($db));
}
if (mysqli_num_rows($resultAmount) > 0) {
while($rowData = mysqli_fetch_array($resultAmount)){
    $fifty=$rowData["fifty"];
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body style="background:linear-gradient(#b289e1,#ADD8E6);  background-attachment:fixed;">
    <a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">home</i></a>
    <a href="options.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left;">list</i></a>

    <div class="x">
        <img src="images\bank logo.png" alt="bank logo" style="width:150px;height:100px;";>
      </div> 
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 text-center">
                <img src="images\withdraw.png" alt="withdraw_image" style="width:500px;height:500px;">
          </div>
          <div class="col-lg-6">
            <form action="withdraw.php" method="post" style="margin-top: 10px;"> 
            <?php include('errors.php') ?>
                <div class="row mb-2 text-center ">
                <h4><b>Enter the amount</b></h4>
                </div>
                <div class="row mby-2">
                    <label for="amount" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name=amount id="amount" required>
                    </div>
                </div>
                <div class="row mt-4 mb-2 text-center">
                <h4><b>Enter the number of notes for the following denominations</b></h4>
                </div>
                <div class="row mb-3 ">
                    <label for="twok" class="col-sm-3 col-form-label"><b>2000:</b></label>
                    <div class="col-sm-6">
                    <input type="number" name="twok" id="twok" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="onek" class="col-sm-3 col-form-label"><b>1000:</b></label>
                    <div class="col-sm-6">
                    <input type="number" name="onek" id="onek" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="fivehundred" class="col-sm-3 col-form-label"><b>500:</b></label>
                    <div class="col-sm-6">
                    <input type="number" name="fivehundred" id="fivehundred" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="hundred" class="col-sm-3 col-form-label"><b>100:</b></label>
                    <div class="col-sm-6">
                    <input type="number" name="hundred" id="hundred" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <label for="fifty" class="col-sm-3 col-form-label"><b>50:</b></label>
                    <div class="col-sm-6">
                    <input type="number" name="fifty" id="fifty" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3 text-center">
                <div id="error"></div>
                </div>
                <div class="row mb-3 text-center">
                <div id="suggest"></div>
                </div>
                <div class="row mb-3 text-center">
                    <div class="col-sm-12">
                    <input type="submit" name="submit" value="Submit" onclick="return errorMessage()" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
                    <input type="reset" value="Reset" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
                    <input type="button" value="Suggest" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;" onclick="suggestDenominations()">
                </div>
                </div> 
                </div>     
            </div>
            </form>
          </div>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script>
    function suggestDenominations() {
        var amount = document.getElementById("amount").value;
        var twokNotes = 0;
        var onekNotes = 0;
        var fivehundredNotes = 0;
        var hundredNotes = 0;
        var fiftyNotes = 0;
        

        var twokAvailable = '<?php echo $twok ;?>';
        var onekAvailable = '<?php echo $onek ;?>';
        var fivehundredAvailable = '<?php echo $fivehundred ;?>';
        var hundredAvailable = '<?php echo $hundred ;?>';
        var fiftyAvailable = '<?php echo $fifty ;?>';
        var denomination_total_atm=twokAvailable*2000+onekAvailable*1000+fivehundredAvailable*500+hundredAvailable*100+fiftyAvailable*50;



  if(denomination_total_atm<amount) 
  document.getElementById("error").innerHTML ="<b>"+denomination_total_atm+"Insufficient ATM cash</b>";
  else
  document.getElementById("error").innerHTML ="";
  if(amount==0) 
  document.getElementById("error").innerHTML ="Enter Amount";
  //if((amount%50)!=0) 
  //document.getElementById("error").innerHTML ="<b>Please Enter Amount as multiple of 50</b>";

  const withdraw = (amount) => {
      
  while (amount >= 50) {
    if (
      amount >= 2000 &&
      ((amount % 2000) % 1000 === 0 || (amount % 2000) %500 === 0|| (amount % 2000) %100 === 0|| (amount % 2000) %50 === 0)&& twokAvailable>0 
    ) {
      amount -= 2000;
      twokAvailable--;
      twokNotes++;
    } else if (
      amount >= 1000 &&
      ((amount % 1000) % 500 === 0|| (amount % 1000) % 100 === 0|| (amount % 1000) % 50 === 0) && onekAvailable>0
    ) {
      amount -= 1000;
      onekAvailable--;
      onekNotes++;
    }else if (
      amount >= 500 &&
      ((amount % 500) % 100 === 0| (amount % 500) % 50 === 0) && fivehundredAvailable>0
    ) {
      amount -= 500;
      fivehundredAvailable--;
      fivehundredNotes++;
    } else if (
      amount >= 100 &&
      ((amount % 100) % 50 === 0) && hundredAvailable>0
    ) {
      amount -= 100;
      hundredAvailable--;
      hundredNotes++;
    } 
    else if((amount % 50)==0 && fiftyAvailable>0) {
        fiftyAvailable--;
      amount -= 50;
      fiftyNotes++;
    }
  }
  
  return [twokNotes,onekNotes,fivehundredNotes,hundredNotes, fiftyNotes];
  
}
if(denomination_total_atm>amount && amount!=0) 
{const suggested_amount = Object.values(withdraw(amount));
//scores.indexOf(10)
document.getElementById("suggest").innerHTML ="<b>Suggested denominations are</b>:<br>2000: "+suggested_amount[0]+"<br>1000: "+suggested_amount[1]+"<br>500:   "+suggested_amount[2]+"<br>100:   "+suggested_amount[3]+"<br>50:    "+suggested_amount[4];}

    }

</script>
</html>
