<!--  Tharaka W.S IT23579580  -->
<?php include 'header.php'; ?>
    <link rel="stylesheet" href="styles/gallery.css"> 
    <script src="js/gallery.js"></script> 
<body>
   
    <main>
    <section class="hero">
            <div class="container">
                <h1>Gallery</h1>
                <p>Explore our curated collection of stunning images that capture the essence of our venues and the unforgettable moments they offer.</p>
            </div>
        </section>
        <section class="h">
            <h2>Ceremonies</h2>
            <div class="gallery">
                <img src="images/gallery/ceremony1.jpg" alt="Ceremony Setup 1" onclick="openModal(this)">
                <img src="images/gallery/ceremony2.jpg" alt="Ceremony Setup 2" onclick="openModal(this)">
                <img src="images/gallery/ceremony3.jpg" alt="Ceremony Setup 3" onclick="openModal(this)">
            </div>
        </section>

        <section class="h">
            <h2>Receptions</h2>
            <div class="gallery">
                <img src="images/gallery/reception1.jpg" alt="Reception Setup 1" onclick="openModal(this)">
                <img src="images/gallery/reception2.jpg" alt="Reception Setup 2" onclick="openModal(this)">
                <img src="images/gallery/reception3.jpg" alt="Reception Setup 3" onclick="openModal(this)">
            </div>
        </section>

        <section class="h">
            <h2>Decorations</h2>
            <div class="gallery">
                <img src="images/gallery/decor1.jpg" alt="Decoration 1" onclick="openModal(this)">
                <img src="images/gallery/decor2.jpg" alt="Decoration 2" onclick="openModal(this)">
                <img src="images/gallery/decor3.jpg" alt="Decoration 3" onclick="openModal(this)">
            </div>
        </section>

        <div id="modal" class="modal" onclick="closeModal()">
            <span class="close">&times;</span>
            <img class="modal-content" id="modal-img">
        </div>
    </main>
    <?php include 'footer.php'; ?>
