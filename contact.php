 <!-- De Silva H.S.S IT23562042  -->
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
    $stmt = $connection->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    
    if ($stmt->execute()) {
        echo "<script>alert('Message sent Successfully!');</script>";
        echo "<script>window.location.href = './contactUs.php';</script>";
    } else {
        echo "<script>alert('Message sent Unsuccessfully!');</script>";
        echo "<script>window.location.href = './contactUs.php';</script>";
    }

    
    $stmt->close();
    $connection->close();
}
?>
