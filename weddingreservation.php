 <!-- De Silva H.S.S IT23562042  -->
<?php
 include 'header.php'; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    
    header("Location: /HotelReservationSystemforWeddings/login.php");
    exit();
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact-no'];
    $venue = $_POST['venue'];
    $weddingDate = $_POST['wedding-date'];
    $guests = $_POST['guests'];
    
   
    $userId = $_SESSION['user_id'];

 
    $stmt = $connection->prepare("INSERT INTO wedding_reservations (userID, name, email, contact_no, venue, wedding_date, guests) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $userId, $name, $email, $contactNo, $venue, $weddingDate, $guests);
    
   
    if ($stmt->execute()) {
        echo "<script>alert('Reservation submitted successfully');</script>";
        echo "<script>window.location.href = './payment.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    
    $stmt->close();
}
?>



<title>Aurora Bliss</title>
<link rel="stylesheet" href="styles/weddingreservation.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>
    <div class="guest">
        <div class="image-container">
            <img src="images/stickers/wedding.png">
        </div>
        <div class="form-container">
            <h2>Wedding Reservation</h2>
            <!-- Form submission is handled by the same page using POST method -->
            <form method="POST" action="">
                <label for="Name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter name">

                <label for="Email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter email">

                <label for="Contact-No">Contact No:</label>
                <input type="tel" id="contact-no" name="contact-no" required placeholder="Enter contact no">

                <label for="venue">Venue:</label>
                <select id="venue" name="venue" required>
                    <option value="" disabled selected>Select Venue</option>
                    <option value="Beachfront Paradise">Beachfront Paradise</option>
                    <option value="Garden Oasis">Garden Oasis</option>
                    <option value="Luxury Ballroom">Luxury Ballroom</option>
                    <option value="Rooftop Terrace">Rooftop Terrace</option>
                </select>

                <label for="wedding-date">Wedding Date:</label>
                <input type="date" id="wedding-date" name="wedding-date" required>

                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" min="1" required placeholder="number of guests">

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
<br><br>
<?php include 'footer.php'; ?>
