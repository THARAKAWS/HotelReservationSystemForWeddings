<!-- /* Samarasinghe A.V.A.V. IT23585676 */ -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];
    $user_id = $_SESSION['user_id'];


    $query = "DELETE FROM payments WHERE payment_id = ? AND user_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii", $payment_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Payment deleted successfully!'); window.location.href = '../bookingoverview.php';</script>";
    } else {
        echo "Error deleting payment: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
} else {
    echo "No payment ID provided.";
}
?>
