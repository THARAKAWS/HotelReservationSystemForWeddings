<?php
//Akith Perera IT23551152
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];

   
    $stmt = $connection->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found.";
        exit();
    }
    $stmt->close();
} else {
    echo "Employee ID not specified.";
    exit();
}
?>
<?php 
session_start(); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


if (!isset($_SESSION['adminID'])) {
    header("Location: ../admin.php"); 
    exit();
}


$adminID = $_SESSION['adminID'];
$sql = "SELECT empID, id FROM employees WHERE id = ?";
if ($stmt = $connection->prepare($sql)) {
    $stmt->bind_param("i", $adminID); 
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc(); 
    } else {
        
        echo "Admin not found.";
        exit();
    }
    $stmt->close();
}

$connection_status = ($connection->connect_error) ? "Server Disconnected" : "Server Connected";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details</title>
    <link rel="stylesheet" href="styles/updateForm.css">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link rel="stylesheet" href="styles/admin.css">
    <script src="js/time.js" defer></script>
    <link rel="icon" href="images/icon/icon.ico" type="image/x-icon">
    <title>Admin</title>
    
</head>
<body>
<header>
        <div class="container">
            <div class="logo"> 
                <a href="index.php"><img src="images/logo_1.jpg" id="logoimage" alt="Aurora Bliss Logo"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                </ul>
            </nav>
            
            <div class="user">
                <span><strong>Admin :</strong> <?php echo htmlspecialchars($admin['empID']); ?></p></span>
            </div>
            <div class="status-item">
        <span class="status <?php echo ($connection_status == 'Server Connected') ? 'connected' : 'disconnected'; ?>">
            <?php echo $connection_status; ?>
        </span>
    </div>
    <div class="admin-controls">
    <a href="./adminPHP/admin_logout.php" class="logout-button">Logout</a>
</div>
<div class="live-time">
            <h4><span id="clock"></span></h4>
        </div>
        </div> 
    </header>
<div class="update-form-container">
<h2>Update Employee Details</h2>

<form action="./adminPHP/updateEmp.php" method="POST">
    <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee['id']); ?>">

    <label for="empID">Employee ID</label>
    <input type="text" name="empID" id="empID" value="<?php echo htmlspecialchars($employee['empID']); ?>" required>

    <label for="empPSW">Password</label>
    <input type="password" name="empPSW" id="empPSW" value="<?php echo htmlspecialchars($employee['empPSW']); ?>" required>

    <label for="empName">Employee Name</label>
    <input type="text" name="empName" id="empName" value="<?php echo htmlspecialchars($employee['empName']); ?>" required>

    <label for="empEmail">Email</label>
    <input type="email" name="empEmail" id="empEmail" value="<?php echo htmlspecialchars($employee['empEmail']); ?>" required>

    <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin" <?php if ($employee['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="manager" <?php if ($employee['role'] == 'manager') echo 'selected'; ?>>Manager</option>
            </select>
    <button type="submit" class="update-button">Update Employee</button>
</form>
</div>
</body>
<?php include 'footer.php'; ?>

