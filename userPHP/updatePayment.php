<!-- /* Samarasinghe A.V.A.V. IT23585676 */ -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    
    $query = "SELECT * FROM payments WHERE payment_id = ? AND user_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ii", $payment_id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $payment = $result->fetch_assoc();
    } else {
        echo "Payment not found!";
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST['amount'];
        $card_number = $_POST['card_number'];
        $expiry_date = $_POST['expiry_date'];

       
        $update_query = "UPDATE payments SET Amount = ?, card_number = ?, expiry_date = ? WHERE payment_id = ?";
        $update_stmt = $connection->prepare($update_query);
        $update_stmt->bind_param("sssi", $amount, $card_number, $expiry_date, $payment_id);

        if ($update_stmt->execute()) {
            echo "<script>alert('Payment updated successfully!'); window.location.href = '../bookingoverview.php';</script>";
        } else {
            echo "Error updating payment: " . $update_stmt->error;
        }

        $update_stmt->close();
    }

    $stmt->close();

} else {
    echo "No payment ID provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Payment</title>
    <link rel="stylesheet" href="../styles/updateguest.css">
</head>
<body>
    <form method="POST">
    <h2>Update Payment</h2>
        Amount: <input type="text" name="amount" value="<?php echo htmlspecialchars($payment['Amount']); ?>" required><br>
        Card Number: <input type="text" name="card_number" value="<?php echo htmlspecialchars($payment['card_number']); ?>" required><br>
        Expiry Date: <input type="date" name="expiry_date" value="<?php echo htmlspecialchars($payment['expiry_date']); ?>" required><br>
        <button type="submit">Update Payment</button>
    </form>
</body>
</html>
