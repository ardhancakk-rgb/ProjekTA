<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetNest - Hubungi Kami</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Outfit, sans-serif;
            background-color: #fffefe;
            color: #452817;
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
            transform: translateY(-5px);
        }

        .contact-hero {
            position: relative;
            height: 55vh;
            min-height: 350px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('{{ asset('images/hero-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .contact-hero-content {
            margin-top: 60px;
        }

        .contact-hero h1 {
            font-size: 55px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .contact-hero p {
            font-size: 22px;
            color: #fdf5f0;
            max-width: 650px;
            margin: 0 auto;
        }

        .contact-section {
            padding: 70px 50px;
            background-color: #fffefe;
        }

        .contact-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(69, 40, 23, 0.12);
            border: 1px solid #fae8dc;
        }

        .contact-info-panel {
            background: linear-gradient(145deg, #452817, #61402d);
            color: #ffffff;
            padding: 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .contact-info-panel h2 {
            font-size: 32px;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .contact-info-panel p.desc {
            color: #e2b18b;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 25px;
        }

        .info-item i {
            font-size: 24px;
            color: #e2702f;
            margin-top: 4px;
        }

        .info-item h4 {
            margin: 0 0 4px 0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #e2b18b;
        }

        .info-item p {
            margin: 0;
            font-size: 17px;
            color: #ffffff;
        }

        .contact-form-panel {
            padding: 45px;
        }

        .contact-form-panel h3 {
            font-size: 28px;
            color: #452817;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #452817;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #d4c5bb;
            border-radius: 10px;
            font-size: 16px;
            font-family: inherit;
            color: #452817;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #e2702f;
            box-shadow: 0 0 0 3px rgba(226, 112, 47, 0.15);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .btn-send {
            background-color: #61402d;
            color: white;
            padding: 12px 32px;
            border-radius: 30px;
            font-size: 18px;
            font-weight: bold;
            font-family: inherit;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
        }

        .btn-send:hover {
            background-color: #ac7353;
            transform: translateY(-4px);
        }

        .footer {
            background-color: #452817;
            color: white;
            padding: 30px 50px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-brand h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .footer-brand p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .footer-brand .social-icons a {
            color: white;
            margin-right: 10px;
            font-size: 20px;
            transition: 0.3s;
        }

        .footer-brand .social-icons a:hover {
            color: #e2702f;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 10px;
            margin-left: 50px;
        }

        .footer-column a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            margin-left: 50px;
            transition: 0.3s;
        }

        .footer-column a:hover {
            color: #e2702f;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .contact-container {
                grid-template-columns: 1fr;
            }

            .contact-section {
                padding: 40px 20px;
            }

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .footer-column h3,
            .footer-column a {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <span>Pet</span>
            <span>Nest</span>
        </div>

        <nav class="nav-menu">
            <a href="/">Home</a>
            <a href="/pets">Pets</a>
            <a href="/about-us">About Us</a>
            <a href="/contact" class="active">Contact</a>
        </nav>

        <div class="nav-auth">
            <a href="/login" class="login">Login</a>
            <a href="/register" class="register">Daftar</a>
        </div>
    </header>

    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Hubungi Kami</h1>
            <p>Ingin berdiskusi soal adopsi hewan, menjadi relawan, atau memberi donasi? Kami siap menyambutmu.</p>
        </div>
    </section>

    <main class="contact-section">
        <div class="contact-container">

            <div class="contact-info-panel">
                <div>
                    <h2>Informasi Shelter</h2>
                    <p class="desc">Datang langsung ke shelter atau hubungi kanal resmi kami untuk informasi lebih lanjut seputar sahabat bulu kita.</p>

                    <div class="info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h4>Lokasi Shelter</h4>
                            <p>JL. RAYA TLOGOMAS NO. 29 MALANG, Kec. Lowokwaru</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <h4>WhatsApp / Telepon</h4>
                            <p>+62 858-5028-8189</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>jayanataa24@gmail.com</p>
                            <p>ardhancakk@gmail.com</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-clock"></i>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Selasa - Minggu (09.00 - 16.00 WIB)</p>
                        </div>s
                    </div>
                </div>
            </div>

            <div class="contact-form-panel">
                <h3>Kirim Pesan</h3>
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Nama kamu" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Topik</label>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Pilih keperluanmu...</option>
                            <option value="adopsi">Adopsi Anjing / Kucing</option>
                            <option value="volunteer">Daftar Relawan</option>
                            <option value="donasi">Bantuan & Donasi</option>
                            <option value="lainnya">Pertanyaan Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan Kamu</label>
                        <textarea id="message" name="message" placeholder="Tuliskan pesan atau hewan yang ingin kamu adopsi..." required></textarea>
                    </div>

                    <button type="submit" class="btn-send">Kirim Pesan</button>
                </form>
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h2>PetNest</h2>
                <p>
                    Tempat bertemunya hewan<br>
                    dengan keluarga baru<br>
                    yang penuh kasih.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Menu</h3><br>
                <a href="/">Home</a><br>
                <a href="/pets">Pets</a><br>
                <a href="/about-us">About Us</a><br>
                <a href="/contact">Contact</a><br>
            </div>
            <div class="footer-column">
                <h3>Help</h3><br>
                <a href="/help">FAQ</a><br>
                <a href="/contact">Contact</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">Terms</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 PetNest. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="<?= asset('js/script.js') ?>"></script>
</body>
</html>