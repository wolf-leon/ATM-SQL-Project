
<?php include('reset-server.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="" type="">
    <link rel="stylesheet" href="style.css">

    <!-- title -->
    <title>ABC Bank</title>

    <!-- bootstrap cdn link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>


<body style="background:linear-gradient(#8fd8d9,#9ee2b4); height: 100vh; background-attachment: fixed;">
    <!-- auth page code here -->
    <a href="index.html" style="color: #000000;"><i class="material-icons" style="font-size:30px">home</i></a>
    <a href="options.html" style="color: #000000;"><i class="material-icons" style="font-size:30px">list</i></a>
    <a href="end.html" style="color: #000000;"><i class="material-icons" style="font-size:30px">exit_to_app</i></a>
    <div class="x">
        <img src="bank logo.png" alt="bank logo" style="width:150px;height:100px;" ;>
    </div>

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
                        <label for="fname" style="font-size:18px; font-weight: bold; padding-right:20px">Enter Old Pin: </label>
                        <input type="text" id="fname"  name="oldpin" placeholder="           4-Digit PIN" style="border-radius:25px;border:1px solid;"><br>
                    </div>
                    
                    <div class="text-center pins" style="margin-bottom:20px;">
                         <label for="fname" style="font-size:18px; font-weight: bold; padding-right:20px">Enter New Pin: </label>
                            <input type="text" id="fname"  name="newpin"  placeholder="           4-Digit PIN" style="border-radius:25px;border:1px solid;"><br>
                    </div>
                    
                    <div class="text-center pins" style="margin-bottom:20px;">
                        <label for="fname" style="font-size:18px; font-weight: bold; padding-right:20px">Re-Enter Pin: </label>
                        <input type="text" id="fname" name="repin" placeholder="           4-Digit PIN" style="border-radius:25px;border:1px solid;" ><br>
                    </div>
                </div>
            </div>

                        <div class="text-center " style="margin-bottom: 20px;">
                           <a href="reset.php"><input type="submit" name="submit" value="Submit" class="rounded-pill btn btn-primary" style="width: 200px; height: 40px;"></a><br><br>
                            <input type="reset" value="Clear" class="rounded-pill btn btn-primary" style="width: 200px; height: 40px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
   
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>