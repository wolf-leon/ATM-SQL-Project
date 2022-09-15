<?php include('pserver.php') ?>
<!DOCTYPE html>
<html>

<body style="background:linear-gradient(
#DF89B5,
#BFD9FE); height: 100vh; background-attachment: fixed;"> <div class="x">
<a href="auth.php" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left; padding: 2px;">arrow_back</i></a>
</div>
    <div data-include="test.html"></div>
    <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
            <img src="images\card.png" alt="bankbg" style="width:550px;height:550px;">
        </div>
        <div class="col col-lg-6 text-center mx-auto">
            <div class=" text-center" style="margin-top: 80px;">
                <div class="mx-auto text-center m">
                    <p style="font-weight: bold;font-size: 60px;">Enter Pin Number</p>
                </div>
                <div class="mx-auto text-center">
                    <form action="pin.php" method="post">
                        <?php include('errors.php') ?>
                        <div class="text-center" style="margin-bottom:20px;">
                            <input type="password" maxlength="4" id="pname" name="pname" placeholder=" PIN"><br>
                        </div>
                        <div class="text-center " style="margin-bottom: 20px;">
                            <input name="pbutton" type="submit" value="Enter" class="rounded-pill btn btn-primary g">
                        </div>
                        <a href="reset.php">Reset Pin.</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="csi.min.js"> </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>