 <!-- De Silva H.S.S IT23562042  -->
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /HotelReservationSystemforWeddings/login.php");
    exit();
}

include 'header.php'; 
?>

<title>User Dashboard</title>
<link rel="stylesheet" href="styles/bookingoverview.css">
<script src="js/bookingoverview.js" defer></script>

<body>
    <div class="dashboard">
        <h1>Welcome to Your Dashboard, <?php echo $_SESSION['user_name']; ?> <span id ="dateTime"></span></h1>
        <div class="navbar">
            <a href="updateAccount.php">Update Account</a>
            <a href="addguest.php">Add Guest</a>
            <a href="#guest-list">Guest List</a>
            <a href="#reservations">Reservations</a>
            <a href="#payments">Payment Details</a>
        </div>

        <div class="content">
           
        

            <div id="guest-list">
                <?php include 'userPHP/guestList.php'; ?>
            </div>

            <div id="reservations">
                <?php include 'userPHP/reservationDetails.php'; ?>
            </div>

            <div id="payments">
                <?php include 'userPHP/paymentDetails.php'; ?>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
</body>
