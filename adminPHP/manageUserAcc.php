<!--Kalana Biyanwila IT23609280-->
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';
$sql = "SELECT * FROM users";
$result = $connection->query($sql);

if ($result->num_rows > 0){
    while($row = $result -> fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["userID"] . "</td>";
        echo "<td>" . $row["userName"] . "</td>";
        echo "<td>" . $row["userFName"] . "</td>";
        echo "<td>" . $row["userEmail"] . "</td>";
        echo "<td>" . $row["userPSW"] . "</td>";
        echo "<td>";
        echo "<a href='adminPHP/deleteUserAcc.php?delete_id=" . $row['userID'] . "' class='action-button' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
}
?>