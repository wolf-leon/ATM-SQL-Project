<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
<!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="width=device-width, initial-scale=1" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="" type="">
  <link rel="stylesheet" href="style.css">

<!-- title -->
        <title>ABC Bank</title>

<!-- bootstrap cdn link -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    
    <body style="background:linear-gradient(#b289e1,#ADD8E6);background-attachment: fixed;">
<!-- withdraw page code here -->
      
      <div class="x">
        <img src="images\bank logo.png" alt="bank logo" style="width:150px;height:100px;";>
      </div> 

      <div class="container-fluid">
        <div class="row mx-auto" >
        <div class="col col-lg-6 text-center">
              <img src="images\withdraw.png" alt="bankbg" style="width:550px;height:491.25px;">
                </div>
        <div class="col col-lg-6 " style="margin-top: 0px;">
            <div class="w-50 m-auto text-center">
                <form action="withdraw_check.php" method="post">
            <div class="form-group ">
            <h4 class="text-center ">&emsp;<b>Enter the amount</b></h4>
            &nbsp;&emsp;&emsp;<input type="number" id="amount" name="amount" size="180" class="text-center" ><br>
            <h4 class="text-center mx-10"><b>&emsp;Enter the number of notes for&nbsp; the following denominations</b></h4>
                    <label for="twok"><b>2000</b></label>
                    <input type="number" name="twok" id="twok"  ><br><br>
                    <label for="onek"><b>1000</b></label>&nbsp;
                    <input type="number" name="onek" id="onek" ><br><br>
                    <label for="fivehundred"><b>500</b></label>&ensp;
                    <input type="number" name="fivehundred" id="fivehundred" ><br><br>
                    <label for="hundred"><b>100</b></label>&ensp;
                    <input type="number" name="hundred" id="hundred" ><br><br>
                    <label for="fifty"><b>50</b></label>&ensp;&nbsp;
                    <input type="number" name="fifty" id="fifty" ><br><br>
                    <span id="error"></span>
                    <br>
                    <div class="text-center " style="margin-bottom: 20px;">
                    <input type="submit" value="Submit" onclick="return errorMessage()" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
                    <input type="reset" value="Reset" class="rounded-pill btn btn-primary" style="width: 100px;height: 50px;">
                    
                </div>
            </form>
                </form>
                </div>
        
            </div>
        </div>
        </div>
        </div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
<script>
    function errorMessage() {
        var twok = document.getElementById("twok").value
        var onek = document.getElementById("onek").value
        var fivehundred = document.getElementById("fivehundred").value
        var hundred = document.getElementById("hundred").value
        var fifty = document.getElementById("fifty").value
        var amount = document.getElementById("amount").value
        var denomination_total=twok*2000+onek*1000+fivehundred*500+hundred*100+fifty*50;
        if (amount%50!=0)
        {
                      // Changing HTML to draw attention
                      error.innerHTML = "<span style='color: red;'><b>Please Enter Amount as multiple of 50.</b></span><br>"
                        return false;

        }
        else if(twok.length<=0 || amount.length<=0 || onek.length<=0 ||fivehundred.length<=0||hundred.length<=0||fifty.length<=0)
        {
          error.innerHTML = "<span style='color: red;'><b>Please Fill All Fields </b></span><br>"
            return false 
        }
        else if (amount!=denomination_total)
        {
            // Changing HTML to draw attention
            error.innerHTML = "<span style='color: red;'><b>Amount does not Match Denominations Entered</b></span><br>"
            return false
            }
         else {
            error.innerHTML = ""
            return true
        }
    }
</script>
</html>