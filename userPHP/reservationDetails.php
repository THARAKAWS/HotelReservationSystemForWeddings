 <!-- De Silva H.S.S IT23562042  -->
<?php
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM wedding_reservations WHERE userid = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Reservation Details</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>Reservation Date</th>
        <th>Venue</th>
    </tr>
    <?php while ($reservation = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $reservation['orderID']; ?></td>
            <td><?php echo $reservation['reservation_date']; ?></td>
            <td><?php echo $reservation['venue']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php
$stmt->close();
?>
