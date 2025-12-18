<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $empID = $_POST['empID'];
    $empPSW = $_POST['empPSW'];
    $empName = $_POST['empName'];
    $empEmail = $_POST['empEmail'];
    $role = $_POST['role'];

   
    $stmt = $connection->prepare("UPDATE employees SET empID = ?, empPSW = ?, empName = ?, empEmail = ?, role = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $empID, $empPSW, $empName, $empEmail, $role, $employee_id);

    
    if ($stmt->execute()) {
        echo "<script>alert('Employee details updated successfully.');</script>";
        echo "<script>window.location.href = '../admin_panel.php';</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

?>
