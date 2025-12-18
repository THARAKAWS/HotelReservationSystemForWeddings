<!-- De Silva H.S.S IT23562042  -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST['order-id-guest'];
    $guestName = $_POST['guest-name'];
    $nicNumber = $_POST['nic-number'];
    $userId = $_SESSION['user_id'];

    $stmt = $connection->prepare("INSERT INTO guests (userID, orderID, guest_name, nic_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $userId, $orderID, $guestName, $nicNumber);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Guest added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}
?>

<h2>Add Guest</h2>

<form method="POST" action="">
    <label for="order-id-guest">Order ID:</label>
    <input type="text" id="order-id-guest" name="order-id-guest" required placeholder="Enter order ID">

    <label for="guest-name">Guest Name:</label>
    <input type="text" id="guest-name" name="guest-name" required placeholder="Enter guest name">

    <label for="nic-number">NIC Number:</label>
    <input type="text" id="nic-number" name="nic-number" required placeholder="Enter NIC number">

    <button type="submit">Add Guest</button>
</form>
