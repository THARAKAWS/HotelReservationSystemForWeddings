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


$userid = $_POST['userid'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "UPDATE users SET userFName = ?, userEmail = ?, userPSW = ? WHERE userID = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("sssi", $fname, $email, $password, $userid); 


if ($stmt->execute()) {
    echo "<script>
            alert('Details updated successfully!');
            window.location.href = 'userAccount.php';
          </script>";
} else {
    echo "Error: " . $connection->error;
}


$stmt->close();

?>
