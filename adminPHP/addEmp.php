<?php
//Akith Perera IT23551152
//call the database configuration file

require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

//create variables to store the input values of text boxes 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $empID = $_POST["empID"];
    $empPSW = $_POST["empPSW"];
    $role = $_POST["role"];

    //create the SQL query to pass input values in database
    $sql = "INSERT INTO employees (empID, empPSW, role) VALUES (?, ?, ?)";
    

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("sss", $empID, $empPSW, $role); 

        //error message or successfull message

        if ($stmt->execute()) {
            echo "<script>alert('Employee added successfully!');</script>";
            echo "<script>window.location.href = '../admin_panel.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>
