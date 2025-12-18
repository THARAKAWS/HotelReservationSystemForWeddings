<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

$sql = "SELECT * FROM employees";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $rowCount = 0; 
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["empName"] . "</td>";
        echo "<td>" . $row["empID"] . "</td>";
        echo "<td>" . $row["empPSW"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";   
        echo "<td>";
        
        
        
        
        
        if ($rowCount > 1) {
             echo "<a href='adminPHP/updateEmp.php?employee_id=" . $row['id'] . "' class='action-button'>Update</a>";
             echo "<a href='adminPHP/deleteEmpAcc.php?delete_id=" . $row['id'] . "' class='action-button' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>";
        }
        else{
            echo "Can not remove or edit SUPER Users ⚠️";
        }
        
        echo "</td>";
        echo "</tr>";
        $rowCount++; 
    }
}
else {
    echo "<tr><td colspan='4'>No records found</td></tr>"; 
}
?>