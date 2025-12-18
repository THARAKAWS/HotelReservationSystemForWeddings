<!--  Tharaka W.S IT23579580  -->
<?php include 'header.php'?>
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
  
    header("Location: /HotelReservationSystemforWeddings/login.php");
    exit();
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


$username = $_SESSION['user_id'];


$sql = "SELECT * FROM users WHERE userID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $username); 
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userid = $user['userID'];
    $email = $user['userEmail'];  
    $fname = $user['userFName'];  
    $password = $user['userPSW'];
    $username=$user['userName'];
} else {
    echo "No user found!";
    exit();
}


$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Account</title>
    <link rel="stylesheet" href="styles/userAcc.css">
</head>
<body>
    <main>
    <div class="account-container">
        <h2>Welcome <br> <?php echo $fname; ?>!</h2>
        <br>
        <img src="images/userIcon.png" alt="User Icon">
        <p><strong>User ID:</strong> <?php echo $userid; ?></p>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>

        <div class="button-group">
            <button class="update-btn" onclick="window.location.href='updateRegUser.php';">Update</button>
            <button class="delete-btn" onclick="window.location.href='deleteRegUser.php';">Delete</button>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    </main>
    <?php include 'footer.php'?>
