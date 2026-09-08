<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f5f7fb;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
        padding: 25px 15px;
        z-index: 1000;
    }

    .sidebar-logo {
        padding: 10px 15px 35px;
        font-size: 22px;
        font-weight: 700;
        color: #2563eb;
    }

    .sidebar-logo span {
        color: #111827;
    }

    .sidebar-menu {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 15px;
        color: #6b7280;
        text-decoration: none;
        border-radius: 10px;
        font-size: 15px;
        transition: 0.2s;
    }

    .sidebar-menu a i {
        width: 20px;
        text-align: center;
        font-size: 16px;
    }

    .sidebar-menu a:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    .sidebar-menu a.active {
        background: #2563eb;
        color: #ffffff;
    }

    .sidebar-divider {
        height: 1px;
        background: #e5e7eb;
        margin: 20px 5px;
    }

    .sidebar-bottom {
        margin-top: auto;
    }

    .sidebar-bottom a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 15px;
        color: #ef4444;
        text-decoration: none;
        border-radius: 10px;
        transition: 0.2s;
    }

    .sidebar-bottom a:hover {
        background: #fef2f2;
    }

    .main-content {
        margin-left: 250px;
        min-height: 100vh;
        padding: 30px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 75px;
            padding: 20px 10px;
        }

        .sidebar-logo {
            text-align: center;
            font-size: 18px;
            padding: 10px 0 30px;
        }

        .sidebar-logo span {
            display: none;
        }

        .sidebar-menu a,
        .sidebar-bottom a {
            justify-content: center;
            padding: 13px;
        }

        .sidebar-menu a span,
        .sidebar-bottom a span {
            display: none;
        }

        .main-content {
            margin-left: 75px;
            padding: 20px;
        }
    }
</style>


<aside class="sidebar">

    <!-- LOGO -->
    <div class="sidebar-logo">
        <span>Pet Nest</span>
    </div>


    <!-- MENU -->
    <nav class="sidebar-menu">

        <a href="{{ url('/dashboard') }}"
           class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/pets') }}"
           class="{{ request()->is('pets*') ? 'active' : '' }}">
            <i class="fa-solid fa-paw"></i>
            <span>Data Hewan</span>
        </a>

        <a href="{{ url('/kategori') }}"
           class="{{ request()->is('kategori*') ? 'active' : '' }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Kategori</span>
        </a>

        <a href="{{ url('/pengajuan') }}"
           class="{{ request()->is('pengajuan*') ? 'active' : '' }}">
            <i class="fa-solid fa-file-lines"></i>
            <span>Pengajuan Adopsi</span>
        </a>

        <div class="sidebar-divider"></div>

        <a href="{{ url('/profil') }}"
           class="{{ request()->is('profil*') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profil</span>
        </a>

    </nav>


    <!-- LOGOUT -->
    <div class="sidebar-bottom">

        <a href="{{ url('/logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>

    </div>

</aside>


<!-- CONTENT -->
<main class="main-content">
    @yield('content')
</main>


<!-- FONT AWESOME -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">