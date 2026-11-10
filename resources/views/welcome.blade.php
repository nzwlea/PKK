<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaksoKu - Bakso Nusantara</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* SCROLL NAVBAR */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 75px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #3e2723;
            background: #fff8f0;
            line-height: 1.6;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #6d2c1d, #a03d22);
            color: #fff;
            padding: 18px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .3);
        }

        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .logo span { color: #ffd54f; }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
        }

        nav a:hover { color: #ffd54f; }

        .cart-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #ffd54f;
            color: #6d2c1d !important;
            padding: 9px 16px;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .15);
        }

        .cart-link:hover {
            color: #6d2c1d !important;
            transform: translateY(-1px);
        }

        /* HERO */
        .hero {
            background:
                linear-gradient(
                    rgba(255, 248, 240, .78),
                    rgba(255, 248, 240, .90)
                ),
                url("{{ asset('images/bakso-home.jpeg') }}") center/cover no-repeat;
            text-align: center;
            padding: 90px 20px 70px;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content { max-width: 800px; }

        .hero h1 {
            font-size: 52px;
            font-weight: 900;
            color: #6d2c1d;
            margin-bottom: 12px;
            line-height: 1.15;
        }

        .hero h1 span { color: #a03d22; }

        .hero p {
            font-size: 20px;
            max-width: 620px;
            margin: 0 auto 30px;
            color: #6d4c41;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #a03d22;
            color: #fff;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .2s;
            box-shadow: 0 4px 14px rgba(160, 61, 34, .3);
            margin: 5px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(160, 61, 34, .4);
        }

        .btn.secondary {
            background: #ffd54f;
            color: #6d2c1d;
        }

        /* SECTION */
        section { padding: 70px 0; }

        .section-title {
            text-align: center;
            font-size: 36px;
            font-weight: 800;
            color: #6d2c1d;
            margin-bottom: 14px;
        }

        .section-subtitle {
            text-align: center;
            color: #8d6e63;
            margin-bottom: 44px;
        }

        /* TENTANG */
        #tentang { background: #fff; }

        .tentang-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .tentang-grid img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .15);
        }

        .tentang-grid h3 {
            font-size: 28px;
            color: #6d2c1d;
            margin-bottom: 14px;
        }

        .tentang-grid p {
            color: #5d4037;
            margin-bottom: 14px;
        }

        /* MENU */
        #menu { background: #fff8f0; }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 26px;
        }

        .menu-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 28px rgba(0, 0, 0, .15);
        }

        .menu-img {
            height: 210px;
            overflow: hidden;
            background: #fde8d7;
        }

        .menu-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: .3s;
        }

        .menu-card:hover .menu-img img { transform: scale(1.05); }

        .menu-img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a03d22;
        }

        .menu-img-placeholder svg { width: 60px; height: 60px; }

        .menu-body { padding: 20px; }

        .menu-body h3 {
            font-size: 20px;
            color: #6d2c1d;
            margin-bottom: 6px;
        }

        .menu-body p {
            color: #8d6e63;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .menu-price {
            font-size: 20px;
            font-weight: 800;
            color: #a03d22;
        }

        .menu-actions { margin-top: 14px; }

        .menu-order {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            border-radius: 30px;
            background: #a03d22;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: .2s;
        }

        .menu-order:hover {
            background: #6d2c1d;
            color: #fff;
            transform: translateY(-1px);
        }

        .view-cart-small {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 13px;
            margin-top: 9px;
            border-radius: 30px;
            background: #fff1e8;
            color: #a03d22;
            border: 1px solid #edcdbd;
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
            transition: .2s;
        }

        .view-cart-small:hover { background: #ffdcca; }

        .empty-menu {
            grid-column: 1 / -1;
            text-align: center;
            color: #8d6e63;
            padding: 30px;
        }

        .empty-menu svg {
            width: 52px;
            height: 52px;
            margin-bottom: 10px;
            color: #a03d22;
        }

        /* CARA PESAN */
        .cara-pesan {
            background: #a03d22;
            color: #fff;
            min-height: 500px;
            display: flex;
            align-items: center;
        }

        .cara-pesan .section-title { color: #fff; }

        .cara-pesan .section-subtitle { color: #f9ded4; }

        .cara-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .cara-card {
            background: rgba(255, 255, 255, .1);
            border-radius: 16px;
            padding: 28px 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, .15);
        }

        .cara-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            background: #ffd54f;
            color: #6d2c1d;
            border-radius: 50%;
        }

        .cara-icon svg { width: 23px; height: 23px; }

        .cara-card h3 { margin-bottom: 7px; }

        .cara-card p {
            color: #f8e4de;
            font-size: 14px;
        }

        /* KONTAK */
        #kontak { background: #fff; }

        .kontak-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .kontak-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 22px;
        }

        .kontak-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff1e8;
            color: #a03d22;
            border-radius: 12px;
        }

        .kontak-icon svg { width: 23px; height: 23px; }

        .kontak-item h4 {
            font-size: 18px;
            color: #6d2c1d;
        }

        .kontak-item p { color: #5d4037; }

        .kontak-card {
            background: #fff8f0;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .08);
        }

        .kontak-card h3 {
            color: #6d2c1d;
            font-size: 25px;
            margin-bottom: 10px;
        }

        .kontak-card p {
            color: #6d4c41;
            margin-bottom: 18px;
        }

        /* FOOTER */
        footer {
            background: #3e2723;
            color: #d7ccc8;
            text-align: center;
            padding: 26px 0;
            font-size: 14px;
        }

        footer strong { color: #ffd54f; }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .menu-grid { grid-template-columns: repeat(2, 1fr); }
            nav ul { gap: 12px; }
        }

        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                gap: 15px;
            }

            nav ul {
                gap: 10px;
                font-size: 13px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero { min-height: 480px; padding: 70px 20px; }
            .hero h1 { font-size: 36px; }
            .hero p { font-size: 17px; }
            .section-title { font-size: 30px; }

            .tentang-grid,
            .kontak-grid,
            .menu-grid,
            .cara-grid {
                grid-template-columns: 1fr;
            }

            .tentang-grid img { height: 280px; }
        }

        @media (max-width: 380px) {
            .logo { font-size: 23px; }
            .hero h1 { font-size: 31px; }
            .btn { padding: 12px 18px; font-size: 14px; }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo bks.png') }}" alt="Logo BaksoKu">
                Bakso<span>Ku</span>
            </div>

            <nav>
                <ul>
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#cara-pesan">Cara Pesan</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    <li>
                        <a href="{{ route('cart.index') }}" class="cart-link">
                            <i data-lucide="shopping-cart"></i>
                            Keranjang
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="hero" id="beranda">
        <div class="hero-content">
            <h1>Bakso <span>Ku</span> di Setiap Suapan</h1>

            <p>
                Nikmati bakso lezat dengan pilihan menu favorit,
                harga terjangkau, dan pemesanan yang lebih praktis
                melalui BaksoKu.
            </p>

            <a href="#menu" class="btn">
                <i data-lucide="utensils"></i>
                Lihat Menu
            </a>

            <a href="#menu" class="btn secondary">
                <i data-lucide="shopping-bag"></i>
                Pesan Sekarang
            </a>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang">
        <div class="container">
            <h2 class="section-title">Tentang Kami</h2>
            <p class="section-subtitle">Mengenal BaksoKu lebih dekat.</p>

            <div class="tentang-grid">
                <div>
                    <img src="{{ asset('images/bakso-home.jpeg') }}" alt="BaksoKu">
                </div>

                <div>
                    <h3>Bakso Enak, Pesan Lebih Praktis</h3>

                    <p>
                        BaksoKu merupakan website pemesanan bakso
                        yang dibuat untuk memudahkan pelanggan dalam
                        melihat menu, harga, dan melakukan pemesanan.
                    </p>

                    <p>
                        Dengan BaksoKu, pelanggan dapat memilih menu
                        dan kustomisasi bakso melalui website sebelum
                        melakukan pembayaran di warung.
                    </p>

                    <a href="#menu" class="btn">
                        <i data-lucide="utensils"></i>
                        Lihat Menu
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- MENU -->
    <section id="menu">
        <div class="container">
            <h2 class="section-title">Menu Andalan</h2>

            <p class="section-subtitle">
                Pilih menu favoritmu, atur kustomisasinya, lalu masukkan ke keranjang.
            </p>

            <div class="menu-grid">
                @forelse ($menus as $menu)
                    <div class="menu-card">
                        <div class="menu-img">
                            @if ($menu->foto)
                                <img
                                    src="{{ asset('images/' . $menu->foto) }}"
                                    alt="{{ $menu->nama_menu }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="menu-img-placeholder">
                                    <i data-lucide="utensils"></i>
                                </div>
                            @endif
                        </div>

                        <div class="menu-body">
                            <h3>{{ $menu->nama_menu }}</h3>

                            <p>
                                Nikmati {{ $menu->nama_menu }}
                                dengan cita rasa lezat khas BaksoKu.
                            </p>

                            <div class="menu-price">
                                Rp{{ number_format($menu->harga, 0, ',', '.') }}
                            </div>

                            <div class="menu-actions">
                                <a
                                    href="{{ route('menus.customize', $menu) }}"
                                    class="menu-order"
                                >
                                    <i data-lucide="sliders-horizontal"></i>
                                    Pilih Kustomisasi
                                </a>

                                <a
                                    href="{{ route('cart.index') }}"
                                    class="view-cart-small"
                                >
                                    <i data-lucide="shopping-cart"></i>
                                    Lihat Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-menu">
                        <i data-lucide="utensils"></i>
                        <h3>Belum Ada Menu Tersedia</h3>
                        <p>Menu akan tampil di sini setelah ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CARA PESAN -->
    <section class="cara-pesan" id="cara-pesan">
        <div class="container">
            <h2 class="section-title">Cara Memesan</h2>
            <p class="section-subtitle">Pesan bakso favoritmu dengan mudah.</p>

            <div class="cara-grid">
                <div class="cara-card">
                    <div class="cara-icon">
                        <i data-lucide="sliders-horizontal"></i>
                    </div>
                    <h3>1. Pilih dan Atur Menu</h3>
                    <p>
                        Pilih bakso favoritmu, lalu tentukan tingkat pedas,
                        sayur, jenis mi, dan topping.
                    </p>
                </div>

                <div class="cara-card">
                    <div class="cara-icon">
                        <i data-lucide="shopping-cart"></i>
                    </div>
                    <h3>2. Periksa Keranjang</h3>
                    <p>
                        Periksa jumlah pesanan dan kustomisasi setiap
                        mangkuk sebelum melanjutkan.
                    </p>
                </div>

                <div class="cara-card">
                    <div class="cara-icon">
                        <i data-lucide="qr-code"></i>
                    </div>
                    <h3>3. Bayar dan Ambil Antrean</h3>
                    <p>
                        Ikuti proses pembayaran. Nomor antrean diberikan
                        setelah pembayaran dikonfirmasi oleh sistem.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak">
        <div class="container">
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-subtitle">Informasi mengenai BaksoKu.</p>

            <div class="kontak-grid">
                <div>
                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <i data-lucide="map-pin"></i>
                        </span>
                        <div>
                            <h4>Lokasi</h4>
                            <p>Tambun, Jawa Barat</p>
                        </div>
                    </div>

                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <i data-lucide="clock"></i>
                        </span>
                        <div>
                            <h4>Jam Buka</h4>
                            <p>09.00 - 18.00</p>
                        </div>
                    </div>

                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <i data-lucide="utensils"></i>
                        </span>
                        <div>
                            <h4>Menu</h4>
                            <p>
                                Menu yang tersedia dapat dilihat
                                pada bagian Menu Andalan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="kontak-card">
                    <h3>Yuk, pesan BaksoKu!</h3>

                    <p>
                        Pilih menu, tentukan kustomisasi, periksa keranjang,
                        lalu lanjutkan ke pembayaran.
                    </p>

                    <a href="#menu" class="btn">
                        <i data-lucide="utensils"></i>
                        Pilih Menu
                    </a>

                    <a href="{{ route('cart.index') }}" class="btn secondary">
                        <i data-lucide="shopping-cart"></i>
                        Lihat Keranjang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <p>
                &copy; 2026 <strong>BaksoKu</strong>.
                Semua hak dilindungi.
            </p>

            <p style="margin-top: 5px;">
                Website pemesanan bakso yang praktis,
                cepat, dan terpercaya.
            </p>
        </div>
    </footer>

    <!-- Lucide Icons -->
    @include('components.lucide')

</body>
</html>
