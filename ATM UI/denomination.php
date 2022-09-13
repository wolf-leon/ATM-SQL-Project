<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
  <body style="background-color: aquamarine;">
  <div data-include="test.html"></div> 
      <a href="table.php">
          <p style="size:60px; float: right ;">View Logs</p>
    </a> 
    <div class="mx-auto text-center m" >
    <p style="font-weight:lighter;font-size: 40px;" >Enter Number of Denominations</p>
    </div>
    <div class="mx-auto text-center" >
    <form action=" " method="post" >
     <div class="text-center" style="margin-bottom:20px;">
        <form id="denomination-form">
            <div class="form-group" style="margin-bottom: 20px;">
              <label style="margin-bottom:20px" id="name-label"  for="2000">2000</label>
              <input
                type="number"
                name="twothousand"
                required
              />
              <br>
            
                <label style="margin-bottom:20px" id="name-label" for="1000">1000</label>
                <input
                  type="number"
                  name="onethousand"
                  required
                />
              <br>
                <label style="margin-bottom:20px" id="name-label" for="500">500</label>
                <input
                  type="number"
                  name="fivehundred"
                  required
                />
<br>
                <label style="margin-bottom:20px" id="name-label" for="100">100</label>
                <input
                  type="number"
                  name="onehundred"
                  required
                />
                <br>
                <label style="margin-bottom:20px" id="name-label" for="50">50</label>
                <input
                  type="number"
                  name="fifty"
                  required
                />
                <br>
              </div>
        <div class="text-center " style="margin-bottom: 20px;">
            <input type="submit" value="Enter" class="rounded-pill btn btn-primary g">
        </div>
    </form>
</div>
</div>            
<?php
if(isset($_POST['submit'])){
  $twothousand=$_POST['twothousand'];
  $onethousand=$_POST['onethousand'];
  $fivehundred=$_POST['fivehundred'];
  $onehundred=$_POST['onehundred'];
  $fifty=$_POST['fifty'];
  $result=mysqli_query($db,"Insert into atmdb(twothousand, onethousand, fivehundred, onehundred,fifty) values('$twothousand','$onethousand','$fivehundred','$onehundred','$fifty')"); 
  
}
?>
       <!-- JavaScript Bundle with Popper -->
<script src="csi.min.js" >

</script>
<script integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>

