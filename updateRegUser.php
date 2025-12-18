<!--  Tharaka W.S IT23579580  -->
<?php include 'header.php'; ?>
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
    $password = $user['userPSW']; 
} else {
    echo "No user found!";
    exit();
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Details</title>
    <link rel="stylesheet" href="styles/updateRegUser.css"> 
</head>
<body>
    <main>
    <div class="update-container">
        <h2>Update Your Details</h2>
        <form action="processUpdate.php" method="post">
            <input type="hidden" name="userid" value="<?php echo $userid; ?>">

            Full Name:
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required>

            User ID:
            <input type="text" id="username" name="username" value="<?php echo $user_id; ?>" required readonly> 

            Email:
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            Password:
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>

            <button type="submit" class="update-btn">Update Details</button>
        </form>
        <a href="userAccount.php">Back to Account</a>
    </div>
    </main>
<?php include 'footer.php' ?>