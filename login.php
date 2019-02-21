<?php

require 'db.php';
if(isset($_POST['email']))
{
    extract($_POST);
    $password= crypt($password, 'dddddddddddddf');
    $sql="select *from user where email= '$email' and password= '$password'";
    $results= mysqli_query($conn, $sql);
    $count =mysqli_num_rows($results);
    if($count== 1)
    {
//        success
        $user= mysqli_fetch_assoc($results);
//        sessions
        session_start();
        $_SESSION['user']=$user;
        header('location:home.php');

    }else
    {
        $error ="Wrong username or password";
    }
}






//
//$password= crypt('123456','dddddddddddddf');
//$sql="INSERT INTO `user`(`id`, `names`, `email`, `badge_number`, `password`) VALUES
//                  (null,'Inspector erico','erico@gmail.com','P001','$password')";
//echo $password;
//
//mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.bundle.min.js"></script
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card" style="margin-top: 60px">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" required class="form-control" id="pwd">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p class="text-danger">
                        <?php
                        if(isset($error))
                            echo $error;
                        ?>
                    </p>

                </div>

            </div>
        </div>
    </div>

</div>
</body>
</html>