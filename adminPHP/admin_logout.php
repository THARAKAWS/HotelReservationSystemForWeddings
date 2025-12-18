<?php
//Akith Perera IT23551152
session_start();


$_SESSION = [];


session_destroy();


header("Location: ../admin.php"); 
exit();
?>
