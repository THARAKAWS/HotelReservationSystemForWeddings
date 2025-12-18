<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';
//Akith Perera IT23551152
if (isset($_GET['delete_id'])) {
    $deleteID = $_GET['delete_id'];

    
    $stmt = $connection->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param("i", $deleteID); 

   
    if ($stmt->execute()) {
        echo "<script>alert('User Account Deleted');</script>";
        echo "<script>window.location.href = '../admin_panel.php';</script>"; 
    } else {
        echo "Account deletion failed: " . $stmt->error;
    }


    $stmt->close();
} else {
    echo "Delete ID not found";
}



?>
