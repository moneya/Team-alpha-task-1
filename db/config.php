<?php

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
$connection=  new mysqli($host, $dbuser, $dbpassword,$dbase);
// if the connection was not successfull
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
// mysql_select_db($dbase, $connection);


// //database table
// $createuser = "CREATE TABLE users (
//     id int(11) NOT NULL AUTO_INCREMENT,
//     username varchar(255) NOT NULL,
//     firstname varchar(255) NOT NULL,
//     lastname varchar(255) NOT NULL,
//     email varchar(255) NOT NULL,
//     password varchar(255) NOT NULL,
//     PRIMARY KEY (id),
//     UNIQUE KEY username (username),
//     UNIQUE KEY email (email)
//    );
// --    INSERT INTO user_login (username,email,Password) VALUES ('mashlog','Password@123');
//    ";

// //Code to see if Table Exists
// $exists = $connection->query("select 1 from $table");

// if(!$exists){
//     // if ($connection->query($createuser) === TRUE) {
//     //     echo "Table created successfully!";
//     // } else {
//     //     echo "Error creating SQL table: " . $connection->error;
//     // }
//     // Create the users table
//     $connection->query($createuser) === TRUE;
// }


$connection->close();