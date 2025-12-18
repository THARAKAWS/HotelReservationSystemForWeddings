<!-- /* Samarasinghe A.V.A.V. IT23585676 */ -->
<?php include 'header.php'?>
    <title>Payment Form</title>
    <link rel="stylesheet" href="styles/payment.css">
</head>
<body>
    <main>
        <div class="main-container">
            <h2>Payment Details</h2>
            <form action="save_payment.php" method="POST">
                <input type="hidden" name="order_id" value= <?php echo htmlspecialchars($_SESSION['user_id']); ?>> <!-- Replace with dynamic value -->
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>"> <!-- Use dynamic value -->
                <input type="hidden" name="cost" value="88500"> 

                <label for="cardType">Card Type:</label>
                <select name="cardType" id="cardType" required>
                    <option value="Visa">Visa</option>
                    <option value="Master Card">Master Card</option>
                    <option value="Paypal">Paypal</option>
                </select>

                <label for="cardNumber">Card Number:</label>
                <input type="text" name="cardNumber" id="cardNumber" required>

                <label for="expiryDate">Expire Date:</label>
                <input type="date" name="expiryDate" id="expiryDate" required>

                <label for="securityCode">Security Code:</label>
                <input type="text" name="securityCode" id="securityCode" required>

                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>

                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>

                <label for="state">State:</label>
                <input type="text" name="state" id="state" required>

                <label for="country">Country:</label>
                <input type="text" name="country" id="country" required>

                <label for="amount">Amount:</label>
                <input type="text" name="amount" id="country" required>

                <input type="checkbox" name="agree" required> I agree to the terms.

                <button type="submit">Pay Now</button>
            </form>
        </div>
    </main>
</body>
<?php include 'footer.php'?>

