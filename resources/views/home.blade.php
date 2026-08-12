<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PetNest - Adopsi Hewan Peliharaan</title>

    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <header class="navbar">

        <div class="logo">
            <span>Pet</span>
            <span>Nest</span>
        </div>

        <nav class="nav-menu">

            <a href="/" class="active">
                Home
            </a>

            <a href="/pets">
                Pets
            </a>

            <a href="/about-us">
                About Us
            </a>

            <a href="/contact">
                Contact
            </a>

        </nav>

        <div class="nav-auth">

            <a href="/login" class="login">
                Login
            </a>

            <a href="/register" class="register">
                Daftar
            </a>

        </div>

    </header>

    <section class="hero">

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <h1>
                Say Hello To Your New Buddy
            </h1>

            <p>
               Our shelter is home to loving cats and dogs waiting for a forever family.
               Browse available pets, learn their stories, and find the perfect companion to brighten your life.
            </p>

            <div class="hero-buttons">

                <a href="/pets" class="btn-primary">
                    View All Pets
                </a>

            </div>

        </div>

    </section>

    <section class="features">

        <div class="feature-card">

            <div class="feature-icon">
                <i class="fa-solid fa-paw"></i>
            </div>

            <h3>
                Adopt A Pet
            </h3>

            <p>
                These Lovely Souls Are Waiting For You
                Tap A Pet To Learn More About Them And Their Story.
            </p>

        </div>

        <div class="feature-card">

            <div class="feature-icon">
                <i class="fa-solid fa-heart"></i>
            </div>

            <h3>
                Be A Volunteer
            </h3>

            <p>
                Help animals find a home
            </p>

        </div>

        <div class="feature-card">

            <div class="feature-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>

            <h3>
                Donate For Them
            </h3>

            <p>
                Support their better future
            </p>

        </div>

    </section>

    <section class="pets-section">

        <div class="section-title">

            <h2>
                These Lovely Souls Are Waiting For You
            </h2>

            <p>
                Tap A Pet To Learn More About Them And Their Story.
            </p>

        </div>

        <div class="pets-grid">

            <div class="pet-card">

                <div class="pet-image">

                    <img src="<?= asset('images/pets/desy.jpg') ?>"
                         alt="Desy">

                </div>

                <div class="pet-info">

                    <h3>
                        Desy
                    </h3>

                    <p>
                        9 Months
                    </p>

                    <p>
                        <i class="fa-solid fa-venus"></i>
                        Betina
                    </p>

                    <span class="pet-status">
                        Terlatih
                    </span>

                </div>

            </div>

            <div class="pet-card">

                <div class="pet-image">

                    <img src="<?= asset('images/pets/micha.jpg') ?>"
                         alt="Micha">

                </div>

                <div class="pet-info">

                    <h3>
                        Micha
                    </h3>

                    <p>
                        3 Years
                    </p>

                    <p>
                        <i class="fa-solid fa-mars"></i>
                        Jantan
                    </p>

                    <span class="pet-status">
                        Ramah
                    </span>

                </div>

            </div>

            <div class="pet-card">

                <div class="pet-image">

                    <img src="<?= asset('images/pets/bony.jpg') ?>"
                         alt="Bony">

                </div>

                <div class="pet-info">

                    <h3>
                        Bony
                    </h3>

                    <p>
                        8 Months
                    </p>

                    <p>
                        <i class="fa-solid fa-mars"></i>
                        Jantan
                    </p>

                    <span class="pet-status">
                        Aktif
                    </span>

                </div>

            </div>

            <div class="pet-card">

                <div class="pet-image">

                    <img src="<?= asset('images/pets/shiro.jpg') ?>"
                         alt="Shiro">

                </div>

                <div class="pet-info">

                    <h3>
                        Shiro
                    </h3>

                    <p>
                        1 Year
                    </p>

                    <p>
                        <i class="fa-solid fa-venus"></i>
                        Betina
                    </p>

                    <span class="pet-status">
                        Terlatih
                    </span>

                </div>

            </div>

        </div>

        <div class="view-all">

            <a href="/pets">
                View All Pets
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </section>

    <section class="about-section">

        <div class="about-content">

            <p class="small-title">
                Adopt And Save
            </p>

            <h2>
                Memberi Mereka
                <br>
                Rumah Yang Nyaman?
            </h2>

            <p>
                Bergabunglah dengan komunitas kami
                untuk membantu hewan mendapatkan
                keluarga dan kehidupan yang lebih baik.
            </p>

            <div class="about-buttons">

                <a href="/pets" class="about-btn">
                    Mulai Sekarang
                </a>

                <a href="/about-us" class="about-btn">
                    Pelajari Lebih
                </a>

            </div>

        </div>

        <div class="character">

            <img src="<?= asset('images/character.png') ?>"
                 alt="PetNest Character">

        </div>

    </section>

    <footer class="footer">

        <div class="footer-container">

            <div class="footer-brand">

                <h2>
                    PetNest
                </h2>

                <p>
                    Tempat bertemunya hewan
                    dengan keluarga baru
                    yang penuh kasih.
                </p>

                <div class="social-icons">

                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                </div>

            </div>

            <div class="footer-column">

                <h3>
                    Menu
                </h3>

                <a href="/">
                    Home
                </a>

                <a href="/pets">
                    Pets
                </a>

                <a href="/about-us">
                    About Us
                </a>

                <a href="/contact">
                    Contact
                </a>

            </div>

            <div class="footer-column">

                <h3>
                    Help
                </h3>

                <a href="/help">
                    FAQ
                </a>

                <a href="/contact">
                    Contact
                </a>

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms
                </a>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                © 2026 PetNest. All Rights Reserved.
            </p>

        </div>

    </footer>

    <script src="<?= asset('js/script.js') ?>"></script>

</body>

</html>