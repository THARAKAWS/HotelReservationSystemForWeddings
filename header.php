<!-- /*Akith Perera IT23551152*/ -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/aboutus.js" defer></script>
    <link rel="icon" href="images/icon/icon.ico" type="image/x-icon">
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
                    <li><a href="aboutUs.php">ABOUT US</a></li>
                    <li><a href="ourFeatures.php">OUR FEATURES</a></li>
                    <li><a href="venue.php">VENUE</a></li>
                    <li><a href="gallery.php">GALLERY</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>
                </ul>
            </nav>
            <a href="weddingreservation.php">
                <button type="button" class="btn booking-btn">Booking Request</button>
            </a>
            <div class="user">
                <?php if (isset($_SESSION['user_email'])): ?>
                   <a href="bookingoverview.php" class="dash"><span>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!<br>Dashboard</span></a> 
                    <a href="logout.php" class="logout">Logout</a>
                <?php else: ?>
                    <span>Hello!</span>
                    <a href="login.php" class="btn">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
</body>
</html>
