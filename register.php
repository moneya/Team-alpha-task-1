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
    <div class="container">
        <img class="top-left" src="images/Subtract.png" alt="">
        <img class="top-right" src="images/Subtract (1).png" alt="">
        <img class="bottom-left" src="images/Subtract (3).png" alt="">
        <img class="bottom-right" src="images/Subtract (2).png" alt="">
    </div>


    <div class="parent">

        <form class="quote" method="post" action="">
            <header>
                <h2>Sign Up</h2>

            </header>
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







</body>

</html>