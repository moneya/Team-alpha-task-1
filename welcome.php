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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

</head>




<body>


<div class="jumbotron text-center">
  <div class="container">
    <i class="fab fa-autoprefixer fa-6x"></i>
    <h1 class="display-3">Welcome Alpha!</h1>
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
    <hr>
    <br>
           <!-- logged in user information -->
           <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?> </strong></p>
        <p>
        <form method='post' action="">
            <input type="submit" class="btn btn-light btn-lg" value="Logout" name="logout">
        </form>
             <!-- <a href="index.php?logout='1'" style="color: red;">logout</a>  -->

        </p>
    <?php endif ?>

   
  </div>
</div>






</body>






    	