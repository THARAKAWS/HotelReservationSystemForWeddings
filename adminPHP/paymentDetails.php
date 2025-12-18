<?php
//Akith Perera IT23551152
if (!$connection || !$connection->ping()) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';
}


$sql = "SELECT payment_id,orderID, user_id, card_type, card_number, expiry_date, 
        security_code, address, city, state, country, cost, created_at 
        FROM payments";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['payment_id']}</td>
                <td>{$row['orderID']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['card_type']}</td>
                <td>{$row['card_number']}</td>
                <td>{$row['expiry_date']}</td>
                <td>{$row['security_code']}</td>
                <td>{$row['address']}</td>
                <td>{$row['city']}</td>
                <td>{$row['state']}</td>
                <td>{$row['country']}</td>
                <td>LKR {$row['cost']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No payment records found.</td></tr>";
}


?>
