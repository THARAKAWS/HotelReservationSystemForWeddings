<?php
//database connection 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "iwt"; 

//create the connection 
$connection = new mysqli($servername, $username, $password, $database);

// if connection fails error message will display
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    
}
?>
