 <!-- De Silva H.S.S IT23562042  -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$guest_id = $_GET['guest_id'];


$query = "SELECT * FROM guests WHERE guestID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $guest_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $guest = $result->fetch_assoc();
} else {
    echo "Guest not found!";
    exit();
}

$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $guest_name = $_POST['guest_name'];
    $nic_number = $_POST['nic_number'];

    $update_query = "UPDATE guests SET guest_name = ?, nic_number = ? WHERE guestID = ?";
    $update_stmt = $connection->prepare($update_query);
    $update_stmt->bind_param("ssi", $guest_name, $nic_number, $guest_id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Guest updated successfully!'); window.location.href = '../bookingoverview.php';</script>";
    } else {
        echo "Error updating guest.";
    }

    $update_stmt->close();
   
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Guest</title>
    <link rel="stylesheet" href="../styles/updateguest.css">
</head>
<body>
    
    <form method="POST">
    <h2>Update Guest</h2>
        Guest Name: <input type="text" name="guest_name" value="<?php echo htmlspecialchars($guest['guest_name']); ?>" required><br>
        NIC Number: <input type="text" name="nic_number" value="<?php echo htmlspecialchars($guest['nic_number']); ?>" required><br>
        <button type="submit">Update Guest</button>
    </form>
</body>


