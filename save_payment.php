<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';
    }

    $stmt = $connection->prepare("INSERT INTO payments (orderID,Amount, user_id, card_type, card_number, expiry_date, security_code, address, city, state, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiissssssss", $order_id, $amount,$user_id, $cardType, $cardNumber, $expiryDate, $securityCode, $address, $city, $state, $country);

    $order_id = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $securityCode = $_POST['securityCode'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $amount = $_POST['amount'];
 

    if ($stmt->execute()) {
        echo "<script>alert('Payment Successfull');</script>";
        header("Location: bookingoverview.php");
    } else {
        echo "<script>alert('Payment Unsuccessfull');</script>";
    }

    
    $stmt->close();
  

?>
