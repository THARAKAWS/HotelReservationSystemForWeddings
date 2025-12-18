<!--  Tharaka W.S IT23579580  -->
<?php include 'header.php'; ?>
    <head><title>Register</title></head>

    <body>

    <link rel="stylesheet" href="styles/registering.css">
    <script src="js/regitering.js" defer></script>
    <div class="form-container">
        <h2>SIGN UP</h2>


        <form method="POST" action="addNewUser.php">
            <input type="text" name="userFName" placeholder="Full Name">
            <input type="text" name="userName" placeholder="Username" required>
            <input type="email" name="userEmail" placeholder="Email">
            <input type="password" name="userPSW" id="pwd" placeholder="Password" required>
           
            
            <div class="terms">
                <h3>Terms and Conditions</h3>
                <p>By using Aurora Bliss, you agree to our terms and conditions. Reservations are non-transferable and subject to availability.
                    Cancellations must be made 30 days in advance for a full refund. 
                    We reserve the right to modify services and prices. 
                    Please read our full terms for additional details and policies.</p>
            </div>

            <label>
                <input type="checkbox" name="terms" id="acceptTerms" onclick="enableButton()" required> I accept all Terms and Conditions
            </label>

            <button type="submit" id="submitBtn" value="SUBMIT" disabled>Signup</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <?php include 'footer.php'; ?>