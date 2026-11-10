<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - BaksoKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff8f0;
            color: #3e2723;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #6d2c1d, #a03d22);
            color: white;
            padding: 20px;
        }

        .header-inner {
            max-width: 1000px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .logo {
            font-size: 26px;
            font-weight: 900;
        }

        .logo span {
            color: #ffd54f;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .back-home:hover {
            color: #ffd54f;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #6d2c1d;
            margin-bottom: 25px;
        }

        .cart-icon {
            width: 30px;
            height: 30px;
        }

        .success, .error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .success {
            background: #e7f7ed;
            color: #247044;
        }

        .error {
            background: #fde8e8;
            color: #a33a3a;
        }

        .cart-box {
            background: white;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-img {
            width: 100px;
            height: 80px;
            border-radius: 12px;
            overflow: hidden;
            background: #fde8d7;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .placeholder-icon {
            width: 35px;
            height: 35px;
            color: #a03d22;
        }

        .cart-info {
            flex: 1;
            min-width: 150px;
        }

        .cart-info h3 {
            color: #6d2c1d;
            margin-bottom: 5px;
        }

        .price {
            color: #a03d22;
            font-weight: 700;
        }

        .custom-details {
            margin-top: 10px;
            font-size: 13px;
            line-height: 1.8;
            color: #795548;
        }

        .custom-detail {
            display: flex;
            align-items: flex-start;
            gap: 7px;
        }

        .custom-detail [data-lucide] {
            width: 15px;
            height: 15px;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-input {
            width: 60px;
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: inherit;
        }

        .update-btn, .remove-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: none;
            padding: 9px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
        }

        .update-btn {
            background: #6d2c1d;
            color: white;
        }

        .update-btn:hover {
            background: #a03d22;
        }

        .remove-btn {
            background: #f5d7d0;
            color: #9d301d;
        }

        .remove-btn:hover {
            background: #e9c0b7;
        }

        .subtotal {
            font-weight: 800;
            color: #a03d22;
            min-width: 120px;
            text-align: right;
        }

        .cart-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            font-size: 22px;
            font-weight: 900;
            color: #6d2c1d;
            margin-bottom: 20px;
        }

        .total-price {
            color: #a03d22;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 22px;
            border-radius: 30px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: 800;
            font-family: inherit;
            font-size: 14px;
        }

        .btn-menu {
            background: #ffd54f;
            color: #6d2c1d;
        }

        .btn-menu:hover {
            background: #ffca28;
        }

        .btn-pay {
            background: linear-gradient(135deg, #a03d22, #6d2c1d);
            color: white;
            text-align: center;
        }

        .btn-pay:hover {
            opacity: .92;
        }

        .btn-clear {
            background: #eee;
            color: #555;
        }

        .btn-clear:hover {
            background: #ddd;
        }

        .empty {
            background: white;
            border-radius: 18px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            color: #a03d22;
            margin-bottom: 18px;
        }

        .empty h2 {
            color: #6d2c1d;
            margin-bottom: 10px;
        }

        .empty p {
            color: #8d6e63;
            margin-bottom: 25px;
        }

        [data-lucide] {
            width: 18px;
            height: 18px;
            stroke-width: 1.8;
            vertical-align: middle;
        }

        @media (max-width: 700px) {
            .header-inner {
                gap: 15px;
                flex-direction: column;
                text-align: center;
            }

            .container {
                margin-top: 28px;
            }

            .cart-box {
                padding: 15px;
            }

            .cart-item {
                flex-wrap: wrap;
                gap: 14px;
            }

            .cart-info {
                min-width: calc(100% - 120px);
            }

            .quantity-form {
                flex-wrap: wrap;
            }

            .subtotal {
                min-width: 0;
                text-align: left;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions .btn,
            .actions form {
                width: 100%;
            }

            .actions form .btn {
                width: 100%;
            }

            .total {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="header-inner">
        <div class="logo">Bakso<span>Ku</span></div>

        <a href="{{ route('home') }}" class="back-home">
            <i data-lucide="arrow-left"></i>
            Kembali ke Menu
        </a>
    </div>
</header>

<main class="container">

    <h1>
        <i data-lucide="shopping-cart" class="cart-icon"></i>
        Keranjang Pesanan
    </h1>

    @if (session('success'))
        <div class="success">
            <i data-lucide="check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="error">
            <i data-lucide="alert-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if (count($cart) > 0)

        <div class="cart-box">

            @foreach ($cart as $id => $item)

                <div class="cart-item">

                    <div class="cart-img">
                        @if (!empty($item['foto']))
                            <img
                                src="{{ asset('images/' . $item['foto']) }}"
                                alt="{{ $item['nama_menu'] }}"
                            >
                        @else
                            <i data-lucide="utensils" class="placeholder-icon"></i>
                        @endif
                    </div>

                    <div class="cart-info">
                        <h3>{{ $item['nama_menu'] }}</h3>

                        <div class="price">
                            Rp{{ number_format($item['harga'], 0, ',', '.') }}
                        </div>

                        <div class="custom-details">
                            <div class="custom-detail">
                                <i data-lucide="flame"></i>
                                <span>Level pedas: {{ $item['level_pedas'] ?? '-' }}</span>
                            </div>

                            <div class="custom-detail">
                                <i data-lucide="sprout"></i>
                                <span>Sayur: {{ $item['sayur'] ?? '-' }}</span>
                            </div>

                            <div class="custom-detail">
                                <i data-lucide="utensils"></i>
                                <span>Jenis mi: {{ $item['jenis_mie'] ?? '-' }}</span>
                            </div>

                            <div class="custom-detail">
                                <i data-lucide="plus-circle"></i>
                                <span>
                                    Topping tahu:
                                    {{ !empty($item['topping_tahu']) ? 'Tambah' : 'Tidak' }}
                                </span>
                            </div>

                            @if (!empty($item['catatan']))
                                <div class="custom-detail">
                                    <i data-lucide="notebook-pen"></i>
                                    <span>Catatan: {{ $item['catatan'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <form
                        action="{{ route('cart.update', $id) }}"
                        method="POST"
                        class="quantity-form"
                    >
                        @csrf
                        @method('PATCH')

                        <input
                            type="number"
                            name="jumlah"
                            value="{{ $item['jumlah'] }}"
                            min="1"
                            max="99"
                            required
                            class="quantity-input"
                            aria-label="Jumlah mangkuk"
                        >

                        <button type="submit" class="update-btn">
                            <i data-lucide="refresh-cw"></i>
                            Update
                        </button>
                    </form>

                    <div class="subtotal">
                        Rp{{ number_format(
                            $item['harga'] * $item['jumlah'],
                            0,
                            ',',
                            '.'
                        ) }}
                    </div>

                    <form
                        action="{{ route('cart.remove', $id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="remove-btn">
                            <i data-lucide="trash-2"></i>
                            Hapus
                        </button>
                    </form>

                </div>

            @endforeach

            <div class="cart-footer">

                <div class="total">
                    <span>Total Pembayaran</span>

                    <span class="total-price">
                        Rp{{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>

                <div class="actions">

                    <a href="{{ route('home') }}#menu" class="btn btn-menu">
                        <i data-lucide="plus"></i>
                        Tambah Menu Lain
                    </a>

                    <form
                        action="{{ route('cart.clear') }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin mengosongkan keranjang?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-clear">
                            <i data-lucide="trash-2"></i>
                            Kosongkan
                        </button>
                    </form>

                    <a
                        href="{{ route('cart.checkout') }}"
                        class="btn btn-pay"
                        style="flex: 1;"
                    >
                        <i data-lucide="credit-card"></i>
                        Lanjut ke Pembayaran
                        <i data-lucide="arrow-right"></i>
                    </a>

                </div>
            </div>

        </div>

    @else

        <div class="empty">
            <i data-lucide="shopping-basket" class="empty-icon"></i>

            <h2>Keranjang Masih Kosong</h2>

            <p>Yuk, pilih bakso favoritmu terlebih dahulu.</p>

            <a href="{{ route('home') }}#menu" class="btn btn-menu">
                <i data-lucide="utensils"></i>
                Lihat Menu
            </a>
        </div>

    @endif

</main>

@include('components.lucide')

</body>
</html>
