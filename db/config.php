<?php
// session_start();
// our database configuration stays here
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbase = "test";
$table= "users";


//Make the connection to the database
$connection=  new mysqli($host, $user, $password,$dbase);
// if the connection was not successfull
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
// mysql_select_db($dbase, $connection);


//database table
$createuser = "CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username),
    UNIQUE KEY email (email)
   )";

//Code to see if Table Exists
$exists = mysql_query("select 1 from $table");

if(!$exists){
    // if ($connection->query($createuser) === TRUE) {
    //     echo "Table created successfully!";
    // } else {
    //     echo "Error creating SQL table: " . $connection->error;
    // }
    // Create the users table
    $connection->query($createuser) === TRUE;
}

