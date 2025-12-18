<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

$sql = "SELECT * FROM contact ORDER BY id DESC";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['message']}</td>
        <td>
                 <form action='adminPHP/delete_message.php' method='POST'>
                        <input type='hidden' name='message_id' class='action-button' value='{$row['id']}'>
                        <button type='submit' class='action-button' onclick='return confirm(\"Are you sure you want to delete this message?\")'>Delete</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No contact messages found.</td></tr>";
}


$connection->close();
?>
