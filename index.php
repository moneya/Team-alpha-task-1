
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

    <img class="top-left" id = "img1" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/feo7opljnv8fzthljrb5.png" alt="">
    <img class="top-right" id = "img2"src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/lrnzpp5pqrvgcvdq436d.png" alt="">
    <img class="bottom-left" id = "img3"src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/upm7yc8p4q1vo2gjpo6y.png" alt="">
    <img class="bottom-right" id = "img4" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/y2jrfxzyu8t25heg5lfr.png" alt="">

      <div class="container">
        <div class="forms-container">

            <form class="log-in" method="post" action="">
              <div>
                  <h2>Log In</h2>
              </div>
                 <!-- Throw an error for an unauthorize access to a secure page -->
            <?php if(!empty($_SESSION['msg'] ) ){
                echo  "You must log in first";
                unset($_SESSION['msg']);
            }

                ?>
            <?php include('errors.php'); ?>
            <div>

                <input  name="username" type="text" placeholder="Username">
                <input  name="password" type="password" placeholder="Password">
                <button class = "button_2" name = "login" type = "submit" >Log in</button>
                <p class="have-act">I'm new here!<strong><a href = "register" class="reg"> Register</a></strong></p>
            </div>
          </form>
        </div>


      </div>


</body>

</html>
