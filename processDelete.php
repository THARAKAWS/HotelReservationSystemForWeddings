<!--  Tharaka W.S IT23579580  -->
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
   
    header("Location: /HotelReservationSystemforWeddings/login.php");
    exit();
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $deleteSql = "DELETE FROM users WHERE userID = ?";
    $deleteStmt = $connection->prepare($deleteSql);
    $deleteStmt->bind_param("i", $user_id); 

    
    if ($deleteStmt->execute()) {
       
        session_destroy();
        echo "<script>
        alert('Account deleted successfully!');
        window.location.href='/HotelReservationSystemforWeddings/login.php';
        </script>";
        exit();
    } else {
        
        echo "Error deleting account: " . $connection->error;
    }

   
    $deleteStmt->close();
}

// Close the database connection
$connection->close();
?>
