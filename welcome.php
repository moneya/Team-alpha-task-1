<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
//   if (isset($_GET['logout'])) {
//   	session_destroy();
//   	unset($_SESSION['username']);
//   	header("location: index.php");
//   }

require('action/auth.php')
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alpha Team</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <img class="top-left" id = "img1" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/feo7opljnv8fzthljrb5.png" alt="">
  <img class="top-right" id = "img2"src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/lrnzpp5pqrvgcvdq436d.png" alt="">
  <img class="bottom-left" id = "img3"src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/upm7yc8p4q1vo2gjpo6y.png" alt="">
  <img class="bottom-right" id = "img4" src="https://res.cloudinary.com/fabianuzukwu/image/upload/v1568717437/teamalpha/y2jrfxzyu8t25heg5lfr.png" alt="">

  <div class="container">
    <div class="forms-container">
      <h1>Welcome Alpha!</h1>
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
        	<h3>
            <?php
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            ?>
        	</h3>
        </div>
        <?php endif ?>
      <p class="secret-text">“Beginning is scary, exciting, terrifying, and all things amazing. Begin even when you're not sure.....What do you have to lose?”
  ― Chris Burkmenn</p>
    </div>
  </div>

  <div>
       <!-- logged in user information -->
     <?php  if (isset($_SESSION['username'])) : ?>
    <p>Welcome <strong><?php echo $_SESSION['username']; ?> </strong></p>
    <input type="submit" value="Logout" name="logout">
    <?php endif ?>
  </div>

</body>
