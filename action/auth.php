<?php

$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbase = "crudsams";
$table= "users";


// initializing variables
$username = "";
$email    = "";
$firstname = "";
$lastname = "";
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


// REGISTER USER
if (isset($_POST['reg'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $c_password = mysqli_real_escape_string($connection, $_POST['c_password']);
  
    // form validation method: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $c_password) {
      array_push($errors, "The passwords does not match");
    }

   
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_exists = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_exists);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO users (username, email, password,firstname,lastname) 
                  VALUES('$username', '$email', '$password', '$firstname', '$lastname')";
        mysqli_query($connection, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: secure.php');
    }
  }


      // logout
      if(isset($_POST['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('Location: index.php');
    }
// uncomment to use for viewing sent $_POST requests
// var_dump($_POST);

// Always close db connection to prevent  memory leak
  $connection->close();