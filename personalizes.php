<?php

$link =mysqli_connect('localhost','immanuella1', 'admin', 'fitness', '3306') 
// define( 'DB_NAME', 'fitness' );
//define( 'DB_USER', 'immanuella1' );
//define( 'DB_PASSWORD', 'admin' );
//define( 'DB_HOST', 'localhost' );

$servername = "localhost";
$username = "immanuella1";
$password = "admin";
$dbname = "fitness";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>