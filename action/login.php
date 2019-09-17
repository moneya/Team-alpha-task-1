<?php
// require('../db/config.php');


// start the session
// session_start();
// our database configuration stays here
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbase = "crudsams";
$table= "users";


// initializing variables
$username = "";
$email    = "";
$errors = array(); 


//Make the connection to the database
$connection=   mysqli_connect($host, $dbuser, $dbpassword,$dbase);
// if the connection was not successfull
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}


// LOGIN USER
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  // store the errors in array 
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  // if there are no errors
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username'OR  email='$email' AND password='$password' LIMIT 1";
  	$results = mysqli_query($connection, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: secure.php');
  	}else {
        // header('location: /');
        // header("Location: http://www.yourwebsite.com/user.php"); 

          array_push($errors, "Wrong username/password combination");
          
  	}
  }
}


// var_dump($_POST);



$connection->close();