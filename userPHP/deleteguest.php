 <!-- De Silva H.S.S IT23562042  -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['guest_id'])) {
    $guest_id = $_GET['guest_id'];


    $stmt = $connection->prepare("DELETE FROM guests WHERE guestid = ?");
    $stmt->bind_param("i", $guest_id);

 
    if ($stmt->execute()) {
        echo "Guest deleted successfully.";
        header("Location: ../bookingoverview.php"); 
        exit();
    } else {
        echo "Error deleting guest: " . $stmt->error;
    }

    $stmt->close();
   
}
?>
