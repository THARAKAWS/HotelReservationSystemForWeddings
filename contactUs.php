 <!-- De Silva H.S.S IT23562042  -->
<?php include 'header.php'; ?>
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <main>
        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-box">
                    <div class="icon">📍</div>
                    <div class="info">
                        <h3 style="color: rgb(255, 255, 255);">Our Location</h3>
                        <p>Colombo, Sri Lanka</p>
                    </div>
                </div>
    
                <div class="contact-box">
                    <div class="icon">📞</div>
                    <div class="info">
                        <h3 style="color: rgb(255, 255, 255);">Phone Number</h3>
                        <p>(+94) 77 253 8469<br>(011) 250 4635</p>
                    </div>
                </div>
    
                <div class="contact-box">
                    <div class="icon">📠</div>
                    <div class="info">
                        <h3 style="color: rgb(255, 255, 255);">Fax</h3>
                        <p>1-234-5678-900</p>
                    </div>
                </div>
    
                <div class="contact-box">
                    <div class="icon">✉️</div>
                    <div class="info">
                        <h3 style="color: rgb(255, 255, 255);">Email</h3>
                        <p>contactus@aurorabliss.com</p>
                    </div>
                </div>
            </div>
    
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="contact.php" method="POST">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Message" required></textarea>
    <button type="submit">SEND</button>
</form>

            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>