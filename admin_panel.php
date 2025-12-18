<?php 
//Akith Perera IT23551152
session_start(); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

if (!isset($_SESSION['adminID'])) {
    header("Location: ../admin.php"); 
    exit();
}


$adminID = $_SESSION['adminID'];
$sql = "SELECT empID, id,empName FROM employees WHERE id = ?";
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

<div class="admin-profile">
    <h3><center>Admin Dashboard</center></h3>
    <div class="profile-info">
        <div class="admin-details">
            <p><strong>Employee ID:</strong> <?php echo htmlspecialchars($admin['id']); ?></p>
            <p><strong>Employee Name:</strong> <?php echo htmlspecialchars($admin['empID']); ?></p>
            <p><strong>Employee Name:</strong> <?php echo htmlspecialchars($admin['empName']); ?></p>
        </div>
    </div>
</div>

<div class="user-management">
    <h3>Manage User Accounts</h3>
    <div class="actions">
    <form method="GET" action="./adminPHP/searchUserAcc.php" class ="in">
    <input type="text" name="search" placeholder="Search by username or ID" required>
    <button type="submit" class="action-button">Search</button>
</form>
    <a href="addUser_Form.php" class="action-button" id ="newemp">Add New User</a>
    </div>
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Full Name</th>
            <th>User Email</th>
            <th>User Password</th>
            <th>Action</th>
        </tr>
        <?php include './adminPHP/manageUserAcc.php';?>
    </table>
</div>

<div class="employee-management">
  <h3>Manage Employee Accounts</h3>  
    <a href="addEmp_Form.php" class="action-button">Add New Employee</a>
    <table>
        <tr>
            <th>Username</th>
            <th>UserID</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php include './adminPHP/manageEmpAcc.php';?>
    </table>
</div>

<div class="payments-section">
    <h3>Payments</h3>
    <table>
        <tr>
        <th>Payment ID</th>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Card Type</th>
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>Security Code</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Cost</th>
            <th>Date</th>
        </tr>
        <?php include './adminPHP/paymentDetails.php'; ?> 
    </table>
</div>
<div class="payments-section">
    <h3>Guests List</h3>
    <table>
        
        <?php include './adminPHP/guestlist.php'; ?> 
    </table>
</div>
<div class="reservations-section">
    <h3>Wedding Reservations</h3>
    <table>
        <?php include './adminPHP/reservationDetails.php'; ?> 
    </table>
</div>
<div class="messages-section">
    <h3>Messages</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php include './adminPHP/messages.php'; ?> 
    </table>
</div>
</main>
</body>
<?php include 'footer.php'; ?>
