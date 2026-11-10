<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - BaksoKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #fff8f3;
            color: #3e2723;
        }

        a {
            text-decoration: none;
        }

        .dashboard {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #8b1e1e, #b52b20);
            color: white;
            padding: 25px 18px;
            position: fixed;
            left: 0;
            top: 0;
        }

        .brand {
            padding: 10px 15px 25px;
            border-bottom: 1px solid rgba(255,255,255,.2);
            margin-bottom: 25px;
        }

        .brand h1 {
            font-size: 27px;
        }

        .brand span {
            color: #ffd54f;
        }

        .brand p {
            font-size: 13px;
            color: #ffe0d5;
            margin-top: 5px;
        }

        .menu-title {
            font-size: 12px;
            color: #ffc7b8;
            text-transform: uppercase;
            margin: 15px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            padding: 13px 15px;
            margin-bottom: 7px;
            border-radius: 10px;
            font-weight: 600;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.15);
        }

        .logout {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 25px;
        }

        .logout button {
            width: 100%;
            border: none;
            background: rgba(255,255,255,.1);
            color: white;
            padding: 13px;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .topbar {
            height: 82px;
            background: white;
            border-bottom: 1px solid #eee;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 40px;
        }

        .topbar h2 {
            font-size: 25px;
            color: #4a2923;
        }

        .topbar p {
            color: #927b74;
            font-size: 14px;
            margin-top: 3px;
        }

        .admin {
            text-align: right;
        }

        .admin strong {
            display: block;
            color: #4a2923;
        }

        .admin span {
            color: #a03d22;
            font-size: 13px;
        }

        .content {
            padding: 35px 40px;
            max-width: 1250px;
        }

        .welcome {
            background: linear-gradient(135deg, #8b1e1e, #b52b20);
            color: white;
            padding: 30px;
            border-radius: 18px;
            margin-bottom: 28px;
            box-shadow: 0 8px 25px rgba(139,30,30,.18);
        }

        .welcome small {
            color: #ffd9ce;
            font-size: 14px;
        }

        .welcome h1 {
            font-size: 30px;
            margin: 7px 0;
        }

        .welcome p {
            color: #ffe8df;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat {
            background: white;
            padding: 25px;
            border-radius: 16px;
            border: 1px solid #f0e3de;
            box-shadow: 0 4px 15px rgba(62,39,35,.06);

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-label {
            color: #8d7770;
            font-size: 14px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            margin-top: 6px;
            color: #4a2923;
        }

        .stat-info {
            font-size: 12px;
            color: #5c8a58;
            margin-top: 5px;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
            background: #fff0eb;
        }

        .quick {
            background: white;
            padding: 28px;
            border-radius: 16px;
            border: 1px solid #f0e3de;
            box-shadow: 0 4px 15px rgba(62,39,35,.06);
        }

        .quick h2 {
            font-size: 21px;
            color: #4a2923;
        }

        .quick-subtitle {
            color: #917c75;
            margin-top: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .quick-card {
            border: 1px solid #eadbd5;
            border-radius: 13px;
            padding: 20px;
            transition: .2s;
        }

        .quick-card:hover {
            border-color: #a03d22;
            box-shadow: 0 5px 18px rgba(160,61,34,.12);
            transform: translateY(-2px);
        }

        .quick-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .quick-card h3 {
            color: #4a2923;
            margin-bottom: 5px;
        }

        .quick-card p {
            color: #8d7770;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .quick-card span {
            color: #a03d22;
            font-weight: 700;
            font-size: 14px;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                width: 100%;
            }

            .content {
                padding: 25px 18px;
            }

            .topbar {
                padding: 0 20px;
            }

            .quick-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

        <div class="brand">
            <h1>🍜 Bakso<span>Ku</span></h1>
            <p>Admin Dashboard</p>
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <a href="{{ route('dashboard') }}">
            🏠
            <span>Dashboard</span>
        </a>

        <a href="{{ route('menus.index') }}">
            🍜
            <span>Kelola Menu</span>
        </a>

        <a href="{{ route('admin.orders') }}" class="active">
            📦
            <span>Pesanan</span>
        </a>

        <!-- PELANGGAN -->
        <a href="{{ route('admin.pelanggan') }}">
            👥
            <span>Pelanggan</span>
        </a>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    🚪 &nbsp; Logout
                </button>
            </form>
        </div>

    </aside>

    <main class="main">

        <header class="topbar">

            <div>
                <h2>Dashboard</h2>

                <p>
                    Kelola BaksoKu dengan mudah.
                </p>
            </div>

            <div class="admin">

                <strong>
                    {{ Auth::user()->name }}
                </strong>

                <span>
                    Administrator
                </span>

            </div>

        </header>

        <section class="content">

            <div class="welcome">

                <small>
                    Selamat datang 👋
                </small>

                <h1>
                    Halo, {{ Auth::user()->name }}!
                </h1>

                <p>
                    Kelola menu, pesanan, dan pelanggan BaksoKu
                    melalui dashboard ini.
                </p>

            </div>

            <div class="stats">

                <div class="stat">

                    <div>
                        <div class="stat-label">
                            Total Menu
                        </div>

                        <div class="stat-number">
                            {{ $totalMenu }}
                        </div>

                        <div class="stat-info">
                            ● Menu tersedia
                        </div>
                    </div>

                    <div class="stat-icon">
                        🍜
                    </div>

                </div>

                <div class="stat">

                    <div>
                        <div class="stat-label">
                            Total Pesanan
                        </div>

                        <div class="stat-number">
                            {{ $totalPesanan }}
                        </div>

                        <div class="stat-info" style="color:#a0833e;">
                            Pesanan masuk
                        </div>
                    </div>

                    <div class="stat-icon">
                        📦
                    </div>

                </div>

                <div class="stat">

                    <div>
                        <div class="stat-label">
                            Total Pelanggan
                        </div>

                        <div class="stat-number">
                            {{ $totalPelanggan }}
                        </div>

                        <div class="stat-info">
                            Pengguna terdaftar
                        </div>
                    </div>

                    <div class="stat-icon">
                        👥
                    </div>

                </div>

            </div>

            <div class="quick">

                <h2>
                    Menu Cepat
                </h2>

                <p class="quick-subtitle">
                    Akses fitur utama BaksoKu.
                </p>

                <div class="quick-grid">

                    <a href="{{ route('menus.index') }}" class="quick-card">

                        <div class="quick-icon">
                            🍜
                        </div>

                        <h3>
                            Kelola Menu
                        </h3>

                        <p>
                            Tambah, edit, dan hapus menu bakso.
                        </p>

                        <span>
                            Kelola sekarang →
                        </span>

                    </a>

                    <a href="{{ route('admin.orders') }}" class="quick-card">

                        <div class="quick-icon">
                            📦
                        </div>

                        <h3>
                            Kelola Pesanan
                        </h3>

                        <p>
                            Lihat pesanan pelanggan.
                        </p>

                        <span>
                            Lihat pesanan →
                        </span>

                    </a>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>
