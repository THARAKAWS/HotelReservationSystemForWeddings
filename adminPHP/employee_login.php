<?php 
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';
$error_msg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $empID = $_POST["empID"];
    $empPSW = $_POST["empPSW"];

    
    $sql = "SELECT * FROM employees WHERE empID = ?";

    if($stmt = $connection->prepare($sql)){
        
        $stmt->bind_param("s", $empID);

        
        $stmt->execute();

        
        $result = $stmt->get_result();

       
        if($result->num_rows > 0) {
           
            $employee = $result->fetch_assoc();

           
            if ($empPSW == $employee['empPSW']) {
                // Start the session
                session_start();
                
                $_SESSION['adminID'] = $employee['id']; 
                $_SESSION['role'] = $employee['role'];  

           
                if ($employee['role'] == 'admin') {
                    
                    header("Location: ../admin_panel.php");
                    exit();
                } elseif ($employee['role'] == 'manager') {
                    
                    header("Location: ../manager_panel.php");
                    exit();
                }
            } else {
                echo "<script>alert('Employee Password is Incorrect');</script>";
                echo "<script>window.location.href ='../admin.php';</script>";
            }
        } else {
            echo "<script>alert('Employee ID does not exist');</script>";
            echo "<script>window.location.href ='../admin.php';</script>";
        }

        
        $stmt->close();
    }
}



?>
