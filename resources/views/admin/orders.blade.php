<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - BaksoKu</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        .brand-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand h1 {
            font-size: 27px;
            margin: 0;
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
            transition: .2s;
        }

        .sidebar a i {
            font-size: 18px;
            width: 20px;
            text-align: center;
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
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout button:hover {
            background: rgba(255,255,255,.2);
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            min-height: 100vh;
        }

        .topbar {
            min-height: 82px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
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

        .page-header {
            background: linear-gradient(135deg, #8b1e1e, #b52b20);
            color: white;
            padding: 30px;
            border-radius: 18px;
            margin-bottom: 28px;
            box-shadow: 0 8px 25px rgba(139,30,30,.18);
        }

        .page-header h1 {
            font-size: 30px;
            margin-bottom: 7px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-header p {
            color: #ffe8df;
        }

        .order-card {
            background: white;
            border: 1px solid #f0e3de;
            border-radius: 16px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(62,39,35,.06);
        }

        .order-header {
            background: #fff4ef;
            padding: 18px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0e3de;
            gap: 15px;
        }

        .queue {
            font-size: 21px;
            font-weight: 800;
            color: #8b1e1e;
        }

        .customer {
            color: #6f5a53;
            font-size: 14px;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .order-date {
            color: #927b74;
            font-size: 13px;
            text-align: right;
        }

        .order-body {
            padding: 22px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th {
            text-align: left;
            color: #8d7770;
            font-size: 13px;
            font-weight: 600;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .order-table td {
            padding: 14px 10px;
            border-bottom: 1px solid #f2ebe8;
            color: #4a2923;
            vertical-align: top;
        }

        .order-table tr:last-child td {
            border-bottom: none;
        }

        .menu-name {
            font-weight: 700;
        }

        .customization {
            margin-top: 10px;
            font-size: 13px;
            line-height: 1.8;
            color: #6f5a53;
        }

        .note {
            margin-top: 9px;
            padding: 11px;
            background: #fff8f3;
            border-radius: 8px;
            border-left: 3px solid #a03d22;
            overflow-wrap: anywhere;
        }

        .note-title {
            font-weight: 700;
            color: #8b1e1e;
            margin-bottom: 4px;
        }

        .note-text {
            white-space: pre-line;
        }

        .price {
            color: #8d7770;
            white-space: nowrap;
        }

        .subtotal {
            font-weight: 700;
            color: #8b1e1e;
            white-space: nowrap;
        }

        .order-total {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 15px;
            margin-top: 15px;
            padding-top: 18px;
            border-top: 2px solid #f0e3de;
        }

        .order-total span {
            color: #8d7770;
            font-size: 14px;
        }

        .order-total strong {
            color: #8b1e1e;
            font-size: 21px;
        }

        .empty {
            background: white;
            border: 1px solid #f0e3de;
            border-radius: 16px;
            padding: 60px 30px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(62,39,35,.06);
        }

        .empty-icon {
            font-size: 50px;
            color: #a03d22;
            margin-bottom: 15px;
        }

        .empty h2 {
            color: #4a2923;
            margin-bottom: 8px;
        }

        .empty p {
            color: #927b74;
            font-size: 14px;
        }

        @media (max-width: 1000px) {
            .content {
                padding: 25px 20px;
            }

            .topbar {
                padding: 15px 20px;
            }

            .order-body {
                overflow-x: auto;
            }

            .order-table {
                min-width: 650px;
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
                padding: 20px 12px;
            }

            .topbar {
                padding: 15px;
            }

            .admin {
                display: none;
            }

            .page-header {
                padding: 22px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .order-header {
                display: block;
            }

            .order-date {
                text-align: left;
                margin-top: 8px;
            }

            .order-body {
                padding: 12px 8px;
            }

            .order-table {
                min-width: 620px;
                font-size: 13px;
            }

            .order-table th,
            .order-table td {
                padding: 10px 6px;
            }

            .order-total strong {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

        <!-- LOGO BAKSOKU -->
        <div class="brand">
            <div class="brand-header">

                <img
                    src="{{ asset('images/logo bks.png') }}"
                    alt="Logo BaksoKu"
                    class="brand-logo"
                >

                <h1>Bakso<span>Ku</span></h1>

            </div>

            <p>Admin Dashboard</p>
        </div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('menus.index') }}">
            <i class="bi bi-egg-fried"></i>
            <span>Kelola Menu</span>
        </a>

        <a href="{{ route('admin.orders') }}" class="active">
            <i class="bi bi-receipt"></i>
            <span>Pesanan</span>
        </a>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h2>Pesanan</h2>
                <p>Lihat pesanan yang masuk ke BaksoKu.</p>
            </div>

            <div class="admin">
                <strong>{{ Auth::user()->name }}</strong>
                <span>Administrator</span>
            </div>
        </header>

        <section class="content">

            <div class="page-header">
                <h1>
                    <i class="bi bi-receipt"></i>
                    Kelola Pesanan
                </h1>

                <p>
                    Lihat nomor antrean, detail menu, kustomisasi, dan catatan pelanggan.
                </p>
            </div>

            @if($orders->count() > 0)

                @foreach($orders as $key => $orderGroup)

                    @php
                        $pesananPertama = $orderGroup->first();

                        $tanggalPesanan = optional($pesananPertama->created_at)
                            ->format('d/m/Y H:i');

                        $nomorAntrian = $pesananPertama->nomor_antrian;

                        $nomor = $nomorAntrian
                            ? 'A' . str_pad($nomorAntrian, 3, '0', STR_PAD_LEFT)
                            : 'Belum ada';

                        $totalPesanan = 0;
                    @endphp

                    <div class="order-card">

                        <div class="order-header">
                            <div>
                                <div class="queue">
                                    Antrean #{{ $nomor }}
                                </div>

                                <div class="customer">
                                    <i class="bi bi-person"></i>

                                    <span>
                                        {{ $pesananPertama->nama_pelanggan ?? 'Pelanggan Umum' }}
                                    </span>
                                </div>
                            </div>

                            <div class="order-date">
                                {{ $tanggalPesanan }}
                            </div>
                        </div>

                        <div class="order-body">

                            <table class="order-table">

                                <thead>
                                    <tr>
                                        <th>Detail Menu & Catatan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($orderGroup as $order)

                                        @php
                                            $subtotal = $order->total_harga;
                                            $totalPesanan += $subtotal;
                                        @endphp

                                        <tr>
                                            <td>
                                                <div class="menu-name">
                                                    {{ optional($order->menu)->nama_menu ?? 'Menu tidak ditemukan' }}
                                                </div>

                                                <div class="customization">

                                                    <div>
                                                        <strong>Level pedas:</strong>
                                                        {{ $order->level_pedas ?: '-' }}
                                                    </div>

                                                    <div>
                                                        <strong>Sayur:</strong>
                                                        {{ $order->sayur ?: '-' }}
                                                    </div>

                                                    <div>
                                                        <strong>Jenis mi:</strong>
                                                        {{ $order->jenis_mie ?: '-' }}
                                                    </div>

                                                    <div>
                                                        <strong>Topping tahu:</strong>
                                                        {{ $order->topping_tahu ? 'Ya' : 'Tidak' }}
                                                    </div>

                                                    <div class="note">
                                                        <div class="note-title">
                                                            <i class="bi bi-chat-left-text"></i>
                                                            Catatan pelanggan
                                                        </div>

                                                        <div class="note-text">
                                                            {{ filled($order->catatan) ? $order->catatan : 'Tidak ada catatan' }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>

                                            <td class="price">
                                                Rp{{ number_format(
                                                    optional($order->menu)->harga ?? 0,
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}
                                            </td>

                                            <td>{{ $order->jumlah }}</td>

                                            <td class="subtotal">
                                                Rp{{ number_format(
                                                    $subtotal,
                                                    0,
                                                    ',',
                                                    '.'
                                                ) }}
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                            <div class="order-total">
                                <span>Total Pesanan</span>

                                <strong>
                                    Rp{{ number_format(
                                        $totalPesanan,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </strong>
                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                <div class="empty">
                    <div class="empty-icon">
                        <i class="bi bi-receipt"></i>
                    </div>

                    <h2>Belum Ada Pesanan</h2>

                    <p>
                        Pesanan akan muncul di halaman ini setelah checkout berhasil.
                    </p>
                </div>

            @endif

        </section>

    </main>

</div>

</body>
</html>
