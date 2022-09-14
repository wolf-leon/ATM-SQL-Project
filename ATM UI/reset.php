<?php include('reset-server.php') ?>

<!DOCTYPE html>
<html>

<body style="background-color: aquamarine;">
<a href="pin.php" style="color: #000000;"><i class="material-icons" style="font-size:30px">arrow_back</i></a>

    <div data-include="test.html"></div>

    <body style="background:linear-gradient(#8fd8d9,#9ee2b4); height: 100vh; background-attachment: fixed;">
        <!-- auth page code here -->
        

        <div class="row mx-auto">
            <div class="col col-lg-6 text-center">
                <img src="reset.png" alt="resetpin" style="width:450px;height:480px;">
            </div>

            <div class="col col-lg-6 text-center mx-auto">
                <div class=" text-center" style="margin-top: 70px;">
                    <div class="mx-auto text-center">

                        <form action="" method="post">
                            <?php include('errors2.php') ?>

                            <div class="text-center pins" style="margin-bottom:20px;padding-top: 20px">
                                <label for="fname" style="font-size:18px; font-weight: bold; padding-right:20px">Enter
                                    Old Pin: </label>
                                <input type="text" id="fname" maxlength="4" name="oldpin" required
                                    placeholder="           4-Digit PIN"
                                    style="border-radius:25px;border:1px solid;"><br>
                            </div>

                            <div class="text-center pins" style="margin-bottom:20px;">
                                <label for="fname" style="font-size:18px; font-weight: bold; padding-right:20px">Enter
                                    New Pin: </label>
                                <input type="text" maxlength="4" id="fname" name="newpin" required
                                    placeholder="           4-Digit PIN"
                                    style="border-radius:25px;border:1px solid;"><br>
                            </div>

                            <div class="text-center pins" style="margin-bottom:20px;">
                                <label for="fname"
                                    style="font-size:18px; font-weight: bold; padding-right:20px">Re-Enter Pin: </label>
                                <input type="text" maxlength="4" id="fname" name="repin" required
                                    placeholder="           4-Digit PIN"
                                    style="border-radius:25px;border:1px solid;"><br>
                            </div>
                    </div>
                </div>

                <div class="text-center " style="margin-bottom: 20px;">
                    <input type="submit" name="submit" value="Submit" onclick=" return confirm('Are you sure you want to change the Pin?')"  class="rounded-pill btn btn-primary" style="width: 200px; height: 40px;"><br><br>
                    <input type="reset" value="Clear" class="rounded-pill btn btn-primary" style="width: 200px; height: 40px;">
                </div>
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
        <script>
             function myFunction(delUrl) {
                if(confirm("Are you sure you want to change the Pin?")){
                {
                    document.location = delUrl;
                    
                } 
                 else
                {
                    document.location = 'reset.php';
                }        
                } 
            }
      </script>
    </body>

</html>