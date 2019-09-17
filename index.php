
<?php

// start the session
session_start();
require('action/auth.php');


?>

<?php  if (isset($_SESSION['username'])) {
     header('Location: welcome');
}
     
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpha Team</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- images  -->
    <div class="container">
        <img class="top-left" src="images/Subtract.png" alt="">
        <img class="top-right" src="images/Subtract (1).png" alt="">
        <img class="bottom-left" src="images/Subtract (3).png" alt="">
        <img class="bottom-right" src="images/Subtract (2).png" alt="">
    </div>


    <div class="parent">

        <form class="quote" method="post" action="">
            <header>
                <h2>Log In</h2>

            </header>
             <!-- Throw an error for an unauthorize access to a secure page -->
        <?php if(!empty($_SESSION['msg'] ) ){
            echo  "You must log in first";
            unset($_SESSION['msg']);
        }
           
            ?>
        <?php include('errors.php'); ?>
            <div>

                <input type="text" name="username" placeholder="Username/Email">
            </div>

            <div>

                <input type="password" name="password" placeholder="Password">
            </div>
            <button class="button_2" name="login"  type="submit">Log In</button>
            <p class="have-act">I Am New Here <a href="register" class="reg">Register</a></p>
        </form>
    </div>







</body>

</html>