<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


$sql = "SELECT * FROM guests ORDER BY orderid DESC"; 
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    
    echo "<tr>
    <th>Guest Name</th>
    <th>NIC Number</th>
    <th>Order ID</th>
        </tr>";

 
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['guest_name']}</td>
                <td>{$row['nic_number']}</td>
                <td>{$row['orderID']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No guests found.</td></tr>";
}

