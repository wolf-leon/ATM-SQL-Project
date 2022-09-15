<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<body style="background-image: linear-gradient(#cceef0,#EAE3D2); background-attachment:fixed; ">
<a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px; float: left; padding: 2px;">arrow_back</i></a> 

    <div data-include="test.html"></div>    <script src="csi.min.js"> </script>

    <div class="row mx-auto">
        <div class="col col-lg-6 text-center">
            <img src="images\card.png" alt="bankbg" style="width:500px;height:500px;">
        </div>
        <div class="col col-lg-6 text-center mx-auto">
            <div class=" text-center" style="margin-top: 80px;">
                <div class="mx-auto text-center m">
                    <p style="font-weight: bold;font-size: 60px;">Enter Card Number</p>
                </div>
                <div class="mx-auto text-center">
                    <form action="auth.php" method="post">
                        <?php include('errors.php') ?>
                        <br>
                        <div class="text-center" style="margin-bottom:20px;">
                            <input type="text" id="fname" name="fname" placeholder=" Card Number"><br>
                        </div>
                        <div class="text-center " style="margin-bottom: 20px;">
                            <input name="cbutton" type="submit" value="Enter" class="rounded-pill btn btn-primary g">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="csi.min.js"> </script>

</body>

</html>