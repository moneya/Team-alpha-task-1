<!DOCTYPE html>
<?php

// start the session
session_start();
require('action/auth.php');
?>

<?php  if (isset($_SESSION['username'])) {
     header('Location: welcome');
}

    ?>

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
    <!-- images  -->
    <img class="top-left" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/feo7opljnv8fzthljrb5.png" alt="">
    <img class="top-right" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/lrnzpp5pqrvgcvdq436d.png" alt="">
    <img class="bottom-left" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/upm7yc8p4q1vo2gjpo6y.png" alt="">
    <img class="bottom-right" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/y2jrfxzyu8t25heg5lfr.png" alt="">



    <div class="container">
      <div class="forms-container">

          <form class="log-in" method="post" action="">
            <div>
                <h2>Log In</h2>
            </div>
            <div class="error">
            <?php if(!empty($_SESSION['msg'] ) ){
            echo  "You must log in first";
            unset($_SESSION['msg']);
            }

                ?>
            <?php include('errors.php'); ?>
            </div>
            <div>
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
            </div>

            <div>
                <input type="text" name="username"  value="<?php echo $username; ?>" placeholder="Username">
            </div>

            <div>

                <input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="First Name">
            </div>
            <div>

                <input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Last Name">
            </div>

            <div>

                <input type="password" name="password"  placeholder="Password">
            </div>

            <div>

                <input type="password" name="c_password" placeholder="Confirm Password">
            </div>
            <button class="button_1" name="reg" type="submit">Become an Alpha</button>
            <p class="have-act">I Already Have An Account?.<a href="/" class="active">Log In</a></p>
        </form>
      </div>
    </div>
</body>
</html>
