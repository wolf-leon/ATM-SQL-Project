<?php
include("config.php");
?>
<!DOCTYPE html>
<html>

<body style="background-image: linear-gradient(#B2D8D8,#EAE3D2	);">
<a href="admin.php" style="color: #000000;"><i class="material-icons" style="font-size:30px">arrow_back</i></a>

    <div data-include="test.html"></div>
        

  
    <div class="mx-auto text-center m">
        <p style="font-weight:lighter;font-size: 40px;">Enter Number of Denominations</p>
    </div>
    <div class="mx-auto text-center">
        <form action=" " method="post">
            <div class="text-center" style="margin-bottom:20px;">
                <form id="denomination-form">
                    <div class="form-group" style="margin-bottom: 20px;">
                        2000
                        <input  style="margin-bottom:15px" type="number" name="twothousand" required />
                        <br>

                        1000
                        <input style="margin-bottom:15px" type="number" name="onethousand" required />
                        <br>
                        500
                        <input style="margin-bottom:15px" type="number" name="fivehundred" required />
                        <br>
                       100
                        <input style="margin-bottom:15px" type="number" name="hundred" required />
                        <br>
                        50
                        <input style="margin-bottom:15px" type="number" name="fifty" required />
                        <br>
                    </div>
                    <div class="text-center " style="margin-bottom: 30px;">
                        <input name= "dbutton" type="submit" value="Enter" class="rounded-pill btn btn-primary g">
                        
                    </div>
                    <a href="table.php">Logs</a>
                    <br>

                    <?php
if(isset($_POST['dbutton'])){
  $twothousand=$_POST['twothousand'];
  $onethousand=$_POST['onethousand'];
  $fivehundred=$_POST['fivehundred'];
  $hundred=$_POST['hundred'];
  $fifty=$_POST['fifty'];
  $totalbalance=2000*$twothousand+1000*$onethousand+500*$fivehundred+100*$hundred+50*$fifty;
  echo "Total Amout:".$totalbalance;
 mysqli_query($db,"INSERT INTO `denomination`(`fifty`, `hundred`, `fivehundred`, `onethousand`, `twothousand`, `total_balance`) VALUES ('$fifty','$hundred','$fivehundred','$onethousand','$twothousand','$totalbalance')"); 
  
}
?>
                </form>
            </div>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="csi.min.js">

    </script>
    <script integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>