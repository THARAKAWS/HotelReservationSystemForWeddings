<!-- /* Samarasinghe A.V.A.V. IT23585676 */ -->
<?php include 'header.php'; ?>
<title>Privacy Policy</title>
<link rel="stylesheet" href="styles/privacy.css">
<script src="js/privacy.js" defer></script>
<main>
    <section class="privacy-policy">
        <h1>Privacy Policy</h1>
        <p>Last Updated: 2021.10.05</p>
        <p>
            Aurora Bliss is committed to protecting guests' personal information. This privacy policy covers the site as well as Aurora Bliss' services and describes how we gather, utilize, and protect the information you give us.<br><br>

            <strong>WHAT INFORMATION WE COLLECT</strong><br>
            We collect:<br>
            - Personal information such as name, email address, address, and contact number.<br>
            - Booking information such as credit card information (only through the bank's safe, encrypted online payment gateway, which is connected to our reservation system. Your payment card information is not collected or stored by Aurora Bliss).<br>
            - Automatically collected data such as IP address, browser type, and cookies.<br><br>

            <strong>WHEN IS YOUR PERSONAL DATA COLLECTED?</strong><br>
            Your personal information may be gathered in several ways, such as when:<br>
            - You reserve a seat on the website.<br>
            - You browse the internet and discover our properties.<br>
            - You fill out an inquiry form, send us an email, or make an inquiry.<br>
            - You sign up for the newsletter's email list.<br>
            - You share a page or an offer.<br><br>

            <strong>SHARING YOUR INFORMATION</strong><br>
            We share your information with trusted third parties only to facilitate your reservation.<br><br>

            <strong>SECURITY OF YOUR INFORMATION</strong><br>
            We take many security measures to protect your personal information. We encrypt your data and limit authorized personnel's access to data with access controls.<br><br>
            
            You have the right to access your personal information anytime and update your information by logging into our website.<br><br>

            <strong>BOOKING AND CANCELLATION POLICY</strong><br>
            You can make a booking anytime via our website. After you make a booking, we send a confirmation email, and a valid credit card is required for your reservation. Depending on your selected plan, deposits may be refundable or non-refundable. If you want to cancel your reservation, you may do so before 24 hours; otherwise, no refund will be provided.<br><br>

            This Privacy Policy may be updated periodically to reflect modifications to our policies or changes imposed by law. We'll notify you of any updates via our website.<br><br>
            
            If you have any questions, please contact us via email or phone.
        </p>
        <form action="submit_policy.php" method="post">
            <input type="checkbox" id="agree" name="agree" required>
            <label for="agree">I agree to the privacy and policy statements.</label><br>
            <button type="submit" class="decline" name="action" value="decline">Decline</button>
            <button type="submit" class="accept" name="action" value="accept">Accept</button>
        </form>
    </section>
</main>
<?php include 'footer.php'; ?>
