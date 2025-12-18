 <!-- De Silva H.S.S IT23562042  -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'];


$query = "SELECT * FROM guests WHERE userID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Guest List</h2>

<table>
    <tr>
        <th>Guest Name</th>
        <th>NIC Number</th>
        <th>Order ID</th>
        <th>Actions</th>
    </tr>
    <?php while ($guest = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($guest['guest_name']); ?></td>
            <td><?php echo htmlspecialchars($guest['nic_number']); ?></td>
            <td><?php echo htmlspecialchars($guest['orderID']); ?></td>
            <td>
                <a href="userPHP/updateguest.php?guest_id=<?php echo $guest['guestID']; ?>" class="updatebutton">
                   Update
                </a>
                <a href="userPHP/deleteguest.php?guest_id=<?php echo $guest['guestID']; ?>" class="button" 
                   onclick="return confirm('Are you sure you want to delete this guest?');">
                   Delete
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
$stmt->close();

?>
