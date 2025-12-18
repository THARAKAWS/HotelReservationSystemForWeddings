<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php'; // Ensure this points to the correct config file

$user_id = $_SESSION['user_id'];


if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM payments WHERE user_id = ?";
$stmt = $connection->prepare($query);


if ($stmt === false) {
    die("Error preparing the query: " . $connection->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Payment Details</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Amount</th>
        <th>Card Number</th>
        <th>Expire Date</th>
        <th>Actions</th> 
    </tr>
    <?php while ($payment = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($payment['orderID']); ?></td>
            <td><?php echo htmlspecialchars($payment['Amount']); ?></td>
            <td><?php echo htmlspecialchars($payment['card_number']); ?></td>
            <td><?php echo htmlspecialchars($payment['expiry_date']); ?></td>
            <td>
                <a href="userPHP/updatePayment.php?payment_id=<?php echo htmlspecialchars($payment['payment_id']); ?>" class="updatebutton">Update</a>
                <a href="userPHP/deletePayment.php?payment_id=<?php echo htmlspecialchars($payment['payment_id']); ?>" class="button" 
                   onclick="return confirm('Are you sure you want to delete this payment?');">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php

$stmt->close();

?>
