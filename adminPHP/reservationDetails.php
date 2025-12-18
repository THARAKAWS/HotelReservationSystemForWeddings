<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


$sql = "SELECT * FROM wedding_reservations ORDER BY orderid DESC"; 
$result = $connection->query($sql);


if ($result->num_rows > 0) {
   
    echo "<tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Venue</th>
            <th>Wedding Date</th>
            <th>Number of Guests</th>
            <th>Order Date</th>
        </tr>";

    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['orderID']}</td>
                <td>{$row['userID']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['contact_no']}</td>
                <td>{$row['venue']}</td>
                <td>{$row['wedding_date']}</td>
                <td>{$row['guests']}</td>
                <td>{$row['reservation_date']}</td>
                
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No reservations found.</td></tr>";
}



?>
