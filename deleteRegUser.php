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

$sql = "SELECT * FROM users WHERE userID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userid = $user['userID'];
    $fname = $user['userFName'];
    $email = $user['userEmail'];
} else {
    echo "No user found!";
    exit();
}


$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Account</title>
    <link rel="stylesheet" href="styles/deleteRegUser.css">
</head>
<body>
    <div class="account-container">
        <h2>Delete Your Account</h2>
        <p><strong>Full Name:</strong> <?php echo $fname; ?></p>
        <p><strong>User ID:</strong> <?php echo $userid; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>

        <form method="post" action="processDelete.php">
            <p>Are you sure you want to delete your account? This action cannot be undone.</p>
            <button type="submit" class="delete-btn">Delete Account</button>
        </form>

        <a href="userAccount.php">Cancel</a>
    </div>
</body>
</html>
