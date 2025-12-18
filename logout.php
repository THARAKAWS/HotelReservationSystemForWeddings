<?php
//Akith Perera IT23551152
session_start();
session_unset(); 
session_destroy(); 
header("Location: index.php"); 
exit();
?>
