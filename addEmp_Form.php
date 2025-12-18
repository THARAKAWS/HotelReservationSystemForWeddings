<?php 
//Akith Perera IT23551152
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
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link rel="stylesheet" href="styles/updateForm.css">
    <link rel="stylesheet" href="styles/addEmp.css">
    <script src="js/time.js" defer></script>
    <link rel="icon" href="images/icon/icon.ico" type="image/x-icon">
    <title>Add Employee</title>
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
    <button class="refresh-button" onclick="refreshPage()">Refresh</button>
</div>
<div class="live-time">
            <h4><span id="clock"></span></h4>
        </div>
        </div>
        <script>
function refreshPage() {
    location.reload();  
}
</script> 
    </header>



<main>
    <div class="form-container">
        <h2>Add New Employee</h2>
        <form action="./adminPHP/addEmp.php" method="POST">
            <div class="form-group">
                <label for="empID">Employee ID:</label>
                <input type="text" id="empID" name="empID" required>
            </div>
            <div class="form-group">
                <label for="empPSW">Password:</label>
                <input type="password" id="empPSW" name="empPSW" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
            <button type="submit" class="submit-button">Add Employee</button>
        </form>
    </div>
</main>
<?php include 'footer.php'; ?>
