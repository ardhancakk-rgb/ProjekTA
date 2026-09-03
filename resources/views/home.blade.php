<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PetNest - Adopsi Hewan Peliharaan</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Outfit", sans-serif;
        }

        .logo {
            display: flex;
            flex-direction: column;
            line-height: 0.9;
        }

        .logo span:first-child {
            color: #e2702f;
            font-weight: bold;
            font-size: 30px;
        }

        .logo span:last-child {
            color: #fff7f7;
            font-weight: bold;
            font-size: 30px;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 50px;
            box-sizing: border-box;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-menu a {
            color: #fff7f7;
            text-decoration: none;
            font-size: 30px;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #e2702f;
        }


        .nav-auth {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-auth a {
            color: #fff7f7;
            text-decoration: none;
            font-size: 30px;
        }

        .nav-auth a:hover {
            color: #faf9f9;
        }

        .nav-auth .login {
            font-weight: bold;
        }

        .nav-auth .login:hover {
            color: #c9a06b;
        }

        .nav-auth .register {
            background-color: #452817;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
        }

        .nav-auth .register:hover {
            background-color: #5a3520;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            transform: translateY(-10px);
        }

        .hero {
            width: 100%;
            height: 100vh;
            min-height: 600px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.45)), url('{{ asset('images/hero-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            min-height: 700px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            margin-left: 80px;
            color: white;
            font-size: 30px;
            font-family: "Outfit", sans-serif;
        }

        .hero-content h1 {
            font-size: 60px;
            font-weight: bold;
            justify-content: center;
            text-align: left;
            margin-left: 0px;
            margin-bottom: 10px;
        }

        .hero-images {
            position: absolute;
            bottom: 0;
            right: 10px;
            width: 20%;
            height: 100%;
            margin-bottom: -50px;
            justify-content: right;
            background-image: url('{{ asset('images/kucing.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 300px;
            height: 350px;
            object-fit: cover;
            object-position: center;
        }

        .btn-primary {
            background-color: #61402d;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.8s;
        }

        .btn-primary:hover {
            background-color: #ac7353;
            transform: translateY(-10px);
        }

        .feature-card {
            background: rgba(105, 73, 73, 0.45);
            border-radius: 15px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            color: white;
            box-shadow: 0 20px 15px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card .feature-icon {
            font-size: 70px;
            margin-bottom: 8px;
            color: #6e452d;
        }

        .features {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            padding: 50px 0;
        }

        .pets-section {
            padding: 10px 0;
            background: #fffefe;
            color: #452817;
        }

        .pets-section .section-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: large;
        }

        .pets-section .section-title h2 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .pets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 50px;
        }

        .pets-grid .pet-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
            margin-top: 50px;
        }

        .pets-grid .pet-card:hover {
            transform: translateY(-30px);
        }

        .pets-grid .pet-card .pet-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .pets-grid .pet-card .pet-info {
            padding: 15px;
        }

        .pets-grid .pet-card .pet-info h3 {
            margin: 0;
            font-size: 24px;
        }

        .pets-grid .pet-card .pet-info p {
            margin: 5px 0;
            font-size: 16px;
        }

        .pets-grid .pet-card .pet-info .pet-status {
            display: inline-block;
            padding: 5px 10px;
            background-color: #61402d;
            color: white;
            border-radius: 20px;
            font-size: 14px;
        }

        .view-all {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .view-all a {
            background-color: #61402d;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
            margin-top: 50px;
        }

        .view-all a:hover {
            background-color: #ac7353;
            transform: translateY(-10px);
        }

        .about-section {
            height: 570px;
            background-color: #e2b18b;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            overflow: hidden;
            text-align: left;
            margin-top: 100px;
        }

        .about-section .about-content {
            max-width: 45%;
            margin-left: 50px;
        }

        .character {
            width: 300px;
            height: auto;
            align-self: flex-end;
        }

        .about-content .small-title {
            font-size: 20px;
            margin-bottom: -30px;
        }

        .about-content h2 {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <header class="navbar">

        <div class="logo">
            <span>Pet</span><br>
            <span>Nest</span>
        </div>

        <nav class="nav-menu">
            <a href="/" class="active">Home</a>
            <a href="/pets">Pets</a>
            <a href="/about-us">About Us</a>
            <a href="/contact">Contact</a>
        </nav>

        <div class="nav-auth">
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Daftar</a>
        </div>

    </header>
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                Say Hello To Your<br> New Buddy
            </h1>
            <p>
                Our shelter is home to loving cats and dogs<br>waiting for a forever family.
                Browse available pets, <br>learn their stories, and find the perfect companion <br>to brighten your
                life.
            </p>
            <br>
            <div class="hero-buttons">
                <a href="/pets" class="btn-primary"> All Pets</a>
            </div>
            <div class="hero-images">
                <a href="('{{ asset('images/kucing.png') }}')"></a>
            </div>
            <div class="hero-images">
                <a href="('{{ asset('images/anjwing.png') }}')"></a>
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
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-heart"></i>
            </div>
            <h3>Be A Volunteer</h3>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>
            <h3>Donate For Them</h3>
        </div>
    </section>
    <section class="pets-section">
        <div class="section-title">
            <h2>These Lovely Souls Are Waiting For You</h2>
            <p>Tap A Pet To Learn More About Them And Their Story.</p>
        </div>
        <div class="pets-grid">
            <div class="pet-card">
                <div class="pet-image">
                    <img src="<?= asset('images/pets/desy.jpg') ?>" alt="Desy">
                </div>
                <div class="pet-info">
                    <h3>Desy</h3>
                    <p>9 Months</p>
                    <p><i class="fa-solid fa-venus"></i>Betina</p>
                    <span class="pet-status">Terlatih</span>
                </div>
            </div>
            <div class="pet-card">
                <div class="pet-image">
                    <img src="<?= asset('images/pets/micha.jpg') ?>" alt="Micha">
                </div>
                <div class="pet-info">
                    <h3>Micha</h3>
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
                    <img src="<?= asset('images/pets/bony.jpg') ?>" alt="Bony">
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
                    <img src="<?= asset('images/pets/shiro.jpg') ?>" alt="Shiro">
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
            <a href="/pets">View All Pets</a>
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
                untuk membantu <br>hewan mendapatkan
                keluarga dan kehidupan yang lebih baik.
            </p>
            <div class="view-all">
                <a href="/pets" class="view-all">
                    Mulai Sekarang
                </a>
            </div>
        </div>
        <div class="character">
            <img src="<?= asset('images/character.png') ?>" alt="PetNest Character">
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