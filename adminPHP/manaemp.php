<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

$sql = "SELECT * FROM employees";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["empName"] . "</td>";
        echo "<td>" . $row["empID"] . "</td>";
        echo "<td>" . $row["empPSW"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";   
        echo "</tr>";
    }}
else {
    echo "<tr><td colspan='4'>No records found</td></tr>"; 
}
?>