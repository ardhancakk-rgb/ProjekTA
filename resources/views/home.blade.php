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
        * {
            box-sizing: border-box;
        }

        html {
            width: 100%;
            scroll-behavior: smooth;
            overflow-x: clip;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: 100%;
            overflow-x: clip;
            font-family: "Outfit", sans-serif;
            color: #452817;
        }

        img {
            max-width: 100%;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            width: 100%;
            padding: 18px 5%;
        }

        .logo {
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            line-height: 0.8;
            text-decoration: none;
        }

        .logo span:first-child,
        .logo span:last-child {
            font-size: 28px;
            font-weight: 800;
        }

        .logo span:first-child {
            color: #e2702f;
        }

        .logo span:last-child {
            color: #fff7f7;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: clamp(12px, 2vw, 28px);
        }

        .nav-menu a,
        .nav-auth a {
            color: #fff7f7;
            text-decoration: none;
            font-size: 30px;
            white-space: nowrap;
            transition: color 0.2s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #e2702f;
        }

        .nav-auth {
            display: flex;
            align-items: center;
            flex-shrink: 0;
            gap: 12px;
        }

        .nav-auth .login {
            font-weight: 700;
        }

        .nav-auth .login:hover {
            color: #e2702f;
        }

        .nav-auth .register {
            padding: 8px 15px;
            border-radius: 8px;
            background: #452817;
            color: #fff;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .nav-auth .register:hover {
            background: #70482f;
        }

        .hero {
            position: relative;
            isolation: isolate;
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 680px;
            height: 100vh;
            max-height: 920px;
            background:
                linear-gradient(rgba(0, 0, 0, 0.70), rgba(0, 0, 0, 0.60)),
                url("../images/hero-bg.png") center / cover no-repeat;
            color: #fff;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: -1;
            background: rgba(0, 0, 0, 0.08);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 55%;
            max-width: 680px;
            margin-left: 6%;
            padding: 120px 0 60px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }

        .hero-content h1 {
            margin: 0 0 18px;
            font-size: clamp(38px, 4.4vw, 64px);
            font-weight: 800;
            line-height: 1.1;
        }

        .hero-content p {
            max-width: 580px;
            margin: 0 0 26px;
            font-size: clamp(15px, 1.35vw, 19px);
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 22px;
            border-radius: 30px;
            background: #61402d;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            transition: 0.25s ease;
        }

        .btn-primary:hover {
            background: #ac7353;
            transform: translateY(-3px);
        }

        .hero-images {
            position: absolute;
            z-index: 1;
            right: 3%;
            bottom: 0;
            width: min(43%, 560px);
            height: 78%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 0;
            pointer-events: none;
            background: none;
        }

        .hero-images img {
            display: block;
            width: 50%;
            height: 100%;
            object-fit: contain;
            object-position: bottom center;
        }

        .hero-images .hero-cat {
            transform: translateX(8%);
        }

        .hero-images .hero-dog {
            transform: translateX(-8%);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-items: stretch;
            gap: 24px;
            width: 100%;
            padding: 60px 7%;
            background: #fff;
        }

        .feature-card {
            margin: 0;
            padding: 25px 18px;
            border-radius: 15px;
            background: rgba(105, 73, 73, 0.12);
            color: #452817;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card .feature-icon {
            margin-bottom: 8px;
            color: #6e452d;
            font-size: 48px;
        }

        .feature-card h3 {
            margin: 8px 0 0;
            font-size: clamp(16px, 1.6vw, 22px);
        }

        .pets-section {
            width: 100%;
            padding: 60px 0;
            background: #fffefe;
            color: #452817;
        }

        .pets-section .section-title {
            margin: 0 auto 35px;
            padding: 0 20px;
            text-align: center;
        }

        .pets-section .section-title h2 {
            margin: 0 0 10px;
            font-size: clamp(27px, 3.2vw, 42px);
            font-weight: 800;
            line-height: 1.2;
        }

        .pets-section .section-title p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .pets-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            align-items: stretch;
            gap: 22px;
            width: 100%;
            padding: 0 5%;
        }

        .pets-grid .pet-card {
            min-width: 0;
            height: 100%;
            margin: 0;
            overflow: hidden;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .pets-grid .pet-card:hover {
            transform: translateY(-20px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
        }

        .pets-grid .pet-card .pet-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #eee6df;
        }

        .pets-grid .pet-card .pet-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .pets-grid .pet-card .pet-info {
            padding: 15px;
            overflow-wrap: anywhere;
        }

        .pets-grid .pet-card .pet-info h3 {
            margin: 0 0 8px;
            font-size: 22px;
            line-height: 1.25;
        }

        .pets-grid .pet-card .pet-info p {
            margin: 5px 0;
            font-size: 15px;
            line-height: 1.45;
        }

        .pets-grid .pet-card .pet-info .pet-status {
            display: inline-block;
            margin-top: 6px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #61402d;
            color: #fff;
            font-size: 13px;
            line-height: 1.3;
        }

        .empty-pets {
            grid-column: 1 / -1;
            padding: 25px;
            text-align: center;
        }

        .view-all {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            text-align: center;
        }

        .view-all a {
            display: inline-block;
            margin-top: 35px;
            padding: 11px 22px;
            border-radius: 30px;
            background: #61402d;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: 0.25s ease;
        }

        .view-all a:hover {
            background: #ac7353;
            transform: translateY(-3px);
        }

        .about-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 35px;
            width: 100%;
            min-height: 480px;
            height: auto;
            margin-top: 35px;
            padding: 60px 7%;
            overflow: hidden;
            background: #e2b18b;
            text-align: left;
        }

        .about-section .about-content {
            max-width: 60%;
            margin: 0;
        }

        .about-content .small-title {
            margin: 0 0 12px;
            font-size: 19px;
        }

        .about-content h2 {
            margin: 0 0 15px;
            font-size: clamp(32px, 4vw, 50px);
            font-weight: 800;
            line-height: 1.2;
        }

        .about-content>p:not(.small-title) {
            font-size: 16px;
            line-height: 1.7;
        }

        .character {
            width: min(35%, 320px);
            flex-shrink: 0;
            align-self: flex-end;
        }

        .character img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .footer {
            width: 100%;
            padding: 40px 6%;
            background: #452817;
            color: #fff;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 35px;
        }

        .footer-brand {
            max-width: 330px;
        }

        .footer-brand h2 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .footer-brand p {
            margin: 0 0 20px;
            font-size: 16px;
            line-height: 1.6;
        }

        .footer-brand .social-icons {
            display: flex;
            gap: 15px;
        }

        .footer-brand .social-icons a {
            color: #fff;
            font-size: 21px;
            transition: color 0.2s ease;
        }

        .footer-brand .social-icons a:hover,
        .footer-column a:hover {
            color: #e2702f;
        }

        .footer-column h3 {
            margin: 0 0 15px;
            font-size: 20px;
        }

        .footer-column a {
            display: block;
            margin: 0 0 10px;
            color: #fff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-bottom {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            font-size: 14px;
        }

        .footer-bottom p {
            margin: 0;
        }

        @media (max-width: 1024px) {
            .navbar {
                gap: 16px;
                padding: 18px 4%;
            }

            .logo span:first-child,
            .logo span:last-child {
                font-size: 25px;
            }

            .nav-menu {
                gap: 14px;
            }

            .nav-menu a,
            .nav-auth a {
                font-size: 15px;
            }

            .nav-auth {
                gap: 9px;
            }

            .hero-content {
                width: 56%;
                margin-left: 5%;
            }

            .hero-images {
                right: 1%;
                width: 45%;
            }

            .pets-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 20px;
                padding: 0 4%;
            }

            .pets-grid .pet-card .pet-image {
                height: 185px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                position: absolute;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 14px;
                padding: 15px 5%;
            }

            .logo span:first-child,
            .logo span:last-child {
                font-size: 23px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                gap: 12px 20px;
            }

            .nav-menu a,
            .nav-auth a {
                font-size: 14px;
            }

            .nav-auth {
                gap: 10px;
            }

            .nav-auth .register {
                padding: 7px 12px;
            }

            .nav-right {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            /* Tombol akun: Login, Daftar, Username, dan Logout */
            .nav-right {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                gap: 12px;
            }

            .nav-right form {
                display: inline-flex;
                margin: 0;
            }

            .nav-right .btn-login,
            .nav-right .btn-register {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 8px 15px;
                border: 1px solid transparent;
                border-radius: 8px;
                font-family: "Outfit", sans-serif;
                font-size: 16px;
                font-weight: 700;
                line-height: 1.5;
                text-decoration: none;
                white-space: nowrap;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease;
            }

            .nav-right .btn-login {
                color: #fff7f7;
                background: transparent;
            }

            .nav-right .btn-login:hover {
                color: #e2702f;
            }

            .nav-right .btn-register {
                color: #fff;
                background: #452817;
                border-color: #452817;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            .nav-right .btn-register:hover {
                background: #70482f;
                border-color: #70482f;
            }

            .nav-right form {
                margin: 0;
            }

            .nav-right .btn-login,
            .nav-right .btn-register {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 11px 20px;
                border-radius: 9px;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                text-decoration: none;
            }

            .nav-right .btn-login {
                color: #5b3c2e;
                background: #f7f4ef;
                border: 1px solid #e5d8cc;
            }

            .nav-right .btn-register {
                color: white;
                background: #5b3c2e;
                border: 1px solid #5b3c2e;
            }

            .nav-right .btn-register:hover {
                background: #84604a;
                border-color: #84604a;
            }


            .hero {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                height: auto;
                min-height: 0;
                max-height: none;
                padding-top: 1px;
            }

            .hero-content {
                width: 100%;
                max-width: none;
                min-height: auto;
                margin: 0;
                padding: 160px 7% 0;
                align-items: center;
                text-align: center;
            }

            .hero-content h1 {
                font-size: clamp(34px, 8vw, 48px);
                text-align: center;
            }

            .hero-content p {
                max-width: 540px;
                font-size: 15px;
                line-height: 1.7;
            }

            .hero-images {
                position: relative;
                right: auto;
                bottom: auto;
                align-self: center;
                width: 100%;
                max-width: 480px;
                height: 290px;
                margin-top: 22px;
            }

            .hero-images img {
                width: 50%;
                height: 100%;
            }

            .features {
                grid-template-columns: 1fr;
                gap: 18px;
                padding: 40px 7%;
            }

            .feature-card {
                padding: 20px;
            }

            .feature-card .feature-icon {
                font-size: 44px;
            }

            .pets-section {
                padding: 45px 0;
            }

            .pets-section .section-title h2 {
                font-size: 29px;
            }

            .pets-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
                padding: 0 5%;
            }

            .pets-grid .pet-card .pet-image {
                height: 160px;
            }

            .pets-grid .pet-card .pet-info {
                padding: 12px;
            }

            .pets-grid .pet-card .pet-info h3 {
                font-size: 19px;
            }

            .pets-grid .pet-card .pet-info p {
                font-size: 14px;
            }

            .about-section {
                min-height: 0;
                flex-direction: column;
                align-items: center;
                gap: 25px;
                padding: 45px 7%;
                text-align: center;
            }

            .about-section .about-content {
                max-width: 100%;
            }

            .about-content h2 {
                font-size: 33px;
            }

            .character {
                width: min(70%, 250px);
                align-self: center;
            }

            .footer {
                padding: 35px 7%;
            }

            .footer-container {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 30px 20px;
            }

            .footer-brand {
                grid-column: 1 / -1;
                max-width: none;
            }
        }

        @media (max-width: 400px) {
            .nav-menu {
                gap: 10px 13px;
            }

            .nav-menu a,
            .nav-auth a {
                font-size: 12px;
            }

            .hero-content {
                padding-top: 155px;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .hero-images {
                height: 235px;
            }

            .pets-grid {
                gap: 12px;
            }

            .pets-grid .pet-card .pet-image {
                height: 125px;
            }

            .pets-grid .pet-card .pet-info {
                padding: 10px;
            }

            .pets-grid .pet-card .pet-info h3 {
                font-size: 16px;
            }

            .pets-grid .pet-card .pet-info p {
                font-size: 12px;
            }

            .pets-grid .pet-card .pet-info .pet-status {
                font-size: 11px;
                padding: 4px 8px;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .footer-brand {
                grid-column: auto;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: 0.20ms !important;
                animation-duration: 0.01ms !important;
            }
        }

        header.navbar .nav-right {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            flex-shrink: 0;
        }

        header.navbar .nav-right a.btn-login {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 9px 16px !important;
            border: 1px solid rgba(255, 247, 247, 0.5) !important;
            border-radius: 8px !important;
            background: rgba(255, 255, 255, 0.1) !important;
            color: #fff7f7 !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            white-space: nowrap;
        }

        header.navbar .nav-right a.btn-login:hover {
            color: #e2702f !important;
            border-color: #e2702f !important;
        }

        header.navbar .nav-right form {
            display: inline-flex !important;
            margin: 0 !important;
        }
        header.navbar .nav-right a.btn-login {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 8px 15px !important;
            border: 1px solid rgba(255, 247, 247, 0.5) !important;
            border-radius: 8px !important;
            background: rgba(255, 255, 255, 0.1) !important;
            color: #fff7f7 !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            text-decoration: none !important;
        }
        header.navbar .nav-right a.btn-register {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 8px 15px !important;
            border: 1px solid #452817 !important;
            border-radius: 8px !important;
            background: #452817 !important;
            color: #fff !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            white-space: nowrap;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.2s ease;
        }
        header.navbar .nav-right a.btn-register:hover {
            background: #70482f !important;
            border-color: #70482f !important;
        }
        header.navbar .nav-right button.btn-register {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 8px 15px !important;
            border: 1px solid #452817 !important;
            border-radius: 8px !important;
            background: #452817 !important;
            color: #fff !important;
            font-family: "Outfit", sans-serif !important;
            font-size: 30px !important;
            font-weight: 700 !important;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        header.navbar .nav-right button.btn-register:hover {
            background: #70482f !important;
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
            <a href="/profile">Profile</a>
            <a href="/contact">Contact</a>
            <a href="{{ route('submission.index') }}">Submission</a>
        </nav>
        <div class="nav-right">
            @auth
                <a href="{{ route('profile.index') }}" class="btn-login">
                    {{ auth()->user()->username ?? auth()->user()->name }}
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-register">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn-register">
                    Daftar
                </a>
            @endauth
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
            @forelse ($hewans as $hewan)
                <div class="pet-card">
                    <div class="pet-image">
                        @if ($hewan->foto)
                            <img src="{{ asset('storage/' . $hewan->foto) }}" alt="{{ $hewan->nama_hewan }}">
                        @else
                            <img src="{{ asset('images/pets/default.jpg') }}" alt="Foto hewan belum tersedia">
                        @endif
                    </div>

                    <div class="pet-info">
                        <h3>{{ $hewan->nama_hewan }}</h3>

                        <p>
                            {{ $hewan->umur ?? '-' }}
                            @if (is_numeric($hewan->umur ?? null))
                                Tahun
                            @endif
                        </p>

                        <p>
                            @if (($hewan->jenis_kelamin ?? '') === 'Betina')
                                <i class="fa-solid fa-venus"></i>
                            @else
                                <i class="fa-solid fa-mars"></i>
                            @endif

                            {{ $hewan->jenis_kelamin ?? '-' }}
                        </p>

                        <span class="pet-status">
                            {{ $hewan->status_adopsi ?? 'Belum tersedia' }}
                        </span>
                    </div>
                </div>
            @empty
                <p>Belum ada data hewan yang tersedia.</p>
            @endforelse
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
                    Tempat bertemu nya hewan
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
                </h3><br>
                <a href="/">
                    Home
                </a><br>
                <a href="/pets">
                    Pets
                </a><br>
                <a href="/profile">
                    Profile
                </a><br>
                <a href="/contact">
                    Contact
                </a><br>
                <a href="{{ route('submission.index') }}">
                    Submission
                </a><br>
            </div>
            <div class="footer-column">
                <h3>
                    Help
                </h3><br>
                <a href="/help">
                    FAQ
                </a><br>
                <a href="/contact">
                    Contact
                </a><br>
                <a href="#">
                    Privacy Policy
                </a><br>
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