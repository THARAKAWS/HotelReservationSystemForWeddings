<?php
session_start(); 
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if (isset($_POST['message_id'])) {
    $message_id = intval($_POST['message_id']); 


    $sql = "DELETE FROM contact WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $message_id); 
    if ($stmt->execute()) {
       
        header("Location: ../admin_panel.php?message=Message deleted successfully");
    } else {
       
        header("Location: ../admin_panel.php?message=Error deleting message");
    }
    $stmt->close();
} else {
    header("Location: ../admin_panel.php?message=Invalid request");
}


$connection->close();
?>
