<?php
//Akith Perera IT23551152
session_start();  


if (!isset($_SESSION['empID'])) {
    
    header("Location: Location: ../admin_panel.php");
    exit;
}


require_once '../configurations/config.php';


$adminID = $_SESSION['empID'];


$sql = "SELECT empID, role FROM employees WHERE empID = '$adminID'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
} else {
    echo "No admin found!";
}
?>
