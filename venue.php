<?php include 'header.php'; 
//Akith Perera IT23551152
?>
    <title>Venues</title>
    <link rel="stylesheet" href="styles/venues.css">
    <script src="js/venues.js" defer></script>

 <section class="venue-video">
        <video autoplay muted loop id="venueVideo">
            <source src="videos/Aurora_Bliss_intro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="overlay-text">
            <h1>Explore Our Stunning Venues</h1>
            <button id="scrollButton">View Venues</button> 
        </div>
    </section>


    <section class="venue-gallery" id="venues">
        <div class="container">
            <h2>Our Venues</h2>
            <div class="venue-locations">
                <div class="venue" data-description="A stunning beachside location for unforgettable weddings." data-image="images/locations/beachFront.jpg">
                    <img src="images/locations/beachFront.jpg" alt="Beachfront Paradise">
                    <h3>Beachfront Paradise</h3>
                </div>
                <div class="venue" data-description="A serene garden setting for intimate gatherings." data-image="images/locations/GardenOasis.jpg">
                    <img src="images/locations/GardenOasis.jpg" alt="Garden Oasis">
                    <h3>Garden Oasis</h3>
                </div>
                <div class="venue" data-description="A luxurious ballroom, perfect for grand celebrations." data-image="images/locations/LuxuryBallroom.jpg">
                    <img src="images/locations/LuxuryBallroom.jpg" alt="Luxury Ballroom">
                    <h3>Luxury Ballroom</h3>
                </div>
                <div class="venue" data-description="A rooftop terrace with a breathtaking view of the city." data-image="images/locations/rooftop.jpg">
                    <img src="images/locations/rooftop.jpg" alt="Rooftop Terrace">
                    <h3>Rooftop Terrace</h3>
                </div>
            </div>
        </div>
    </section>

  
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
    </div>
    <?php include 'footer.php'; ?>

