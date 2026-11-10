<!DOCTYPE html><html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS - BaksoKu</title><style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: linear-gradient(135deg, #fff8f0, #fde8d7);
        color: #3e2723;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
    }

    .payment-wrapper {
        width: 100%;
        max-width: 820px;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(80, 40, 20, 0.14);
    }

    .top-header {
        background: linear-gradient(135deg, #6d2c1d, #a03d22);
        color: white;
        padding: 13px 23px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .brand {
        font-size: 21px;
        font-weight: 900;
        letter-spacing: 1px;
    }

    .brand span {
        color: #ffd54f;
    }

    .secure-small {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: #ffe9df;
    }

    .payment-content {
        display: grid;
        grid-template-columns: 0.9fr 1.1fr;
    }

    .qris-section {
        background: #fff8f0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .qris-section h1 {
        color: #6d2c1d;
        font-size: 21px;
        margin-bottom: 4px;
    }

    .subtitle {
        color: #8d6e63;
        font-size: 11px;
        margin-bottom: 11px;
        line-height: 1.6;
    }

    .qr-box {
        background: white;
        padding: 10px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: 1px solid #eadbd1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qr-box img {
        width: 165px;
        height: 165px;
        object-fit: contain;
        display: block;
    }

    .scan-text {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        margin-top: 10px;
        font-size: 11px;
        color: #6d4c41;
    }

    .simulation {
        margin-top: 7px;
        font-size: 10px;
        color: #a1887f;
        line-height: 1.6;
    }

    .detail-section {
        padding: 19px 23px;
        background: white;
    }

    .detail-section h2 {
        color: #6d2c1d;
        font-size: 20px;
        margin-bottom: 11px;
    }

    .customer-field {
        margin-bottom: 12px;
    }

    .customer-field label {
        display: block;
        color: #6d2c1d;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .customer-field input {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #e5c9b9;
        border-radius: 9px;
        font-family: inherit;
        font-size: 13px;
        color: #3e2723;
        outline: none;
    }

    .customer-field input:focus {
        border-color: #a03d22;
        box-shadow: 0 0 0 3px rgba(160, 61, 34, 0.08);
    }

    .customer-error {
        color: #c62828;
        font-size: 11px;
        margin-top: 5px;
    }

    .queue-box {
        background: linear-gradient(135deg, #fff4cf, #fff8e7);
        border: 1px solid #f0d77a;
        border-radius: 11px;
        padding: 12px 10px;
        margin-bottom: 11px;
        text-align: center;
    }

    .queue-label {
        color: #8d6e63;
        font-size: 10px;
        margin-bottom: 5px;
    }

    .queue-number {
        color: #a03d22;
        font-size: 29px;
        font-weight: 900;
        line-height: 1.2;
    }

    .queue-date {
        color: #8d6e63;
        font-size: 10px;
        margin-top: 5px;
    }

    .queue-info {
        color: #8d6e63;
        font-size: 10px;
        margin-top: 5px;
        line-height: 1.5;
    }

    .order-box {
        background: #fff8f0;
        border-radius: 11px;
        padding: 12px;
        border: 1px solid #f0ded2;
        margin-bottom: 11px;
    }

    .order-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #6d2c1d;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .order-item {
        padding: 9px 0;
        border-bottom: 1px solid #eadbd1;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-item-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .order-name {
        color: #3e2723;
        font-weight: 700;
        font-size: 12px;
    }

    .order-subtotal {
        color: #a03d22;
        font-weight: 800;
        font-size: 12px;
        white-space: nowrap;
    }

    .order-detail {
        color: #8d6e63;
        font-size: 10px;
        margin-top: 4px;
        line-height: 1.7;
    }

    .detail-line {
        display: flex;
        align-items: flex-start;
        gap: 5px;
    }

    .detail-line [data-lucide] {
        width: 13px;
        height: 13px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .total-row {
        border-top: 1px solid #e5d3c8;
        margin-top: 8px;
        padding-top: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .total-row span:first-child {
        color: #6d2c1d;
        font-weight: 700;
        font-size: 12px;
    }

    .total-price {
        color: #a03d22;
        font-size: 18px;
        font-weight: 900;
    }

    .security-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f1faf5;
        border: 1px solid #cdebd9;
        border-radius: 10px;
        padding: 8px 10px;
        margin-bottom: 10px;
    }

    .security-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #d9f4e3;
        color: #246b43;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .security-text strong {
        display: block;
        color: #246b43;
        font-size: 11px;
    }

    .security-text span {
        display: block;
        color: #6b8a78;
        font-size: 9px;
        margin-top: 2px;
    }

    .method-title {
        color: #6d2c1d;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .selected-method {
        display: flex;
        align-items: center;
        gap: 9px;
        border: 1px solid #a03d22;
        background: #fff5ef;
        border-radius: 9px;
        padding: 8px 10px;
        margin-bottom: 10px;
    }

    .qris-logo {
        width: 45px;
        height: 28px;
        border-radius: 6px;
        background: #111;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        font-size: 10px;
    }

    .selected-method strong {
        color: #3e2723;
        display: block;
        font-size: 11px;
    }

    .selected-method span {
        color: #8d6e63;
        font-size: 9px;
    }

    .pay-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        border: none;
        border-radius: 30px;
        padding: 12px;
        background: linear-gradient(135deg, #a03d22, #6d2c1d);
        color: white;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 4px 11px rgba(160, 61, 34, 0.25);
        transition: .2s;
    }

    .pay-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(160, 61, 34, 0.35);
    }

    .back {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        color: #6d2c1d;
        text-decoration: none;
        font-size: 11px;
        margin-top: 10px;
    }

    .back:hover {
        color: #a03d22;
    }

    [data-lucide] {
        width: 18px;
        height: 18px;
        stroke-width: 1.8;
        vertical-align: middle;
    }

    @media (max-width: 800px) {
        body {
            padding: 10px;
            align-items: flex-start;
        }

        .payment-wrapper {
            max-width: 600px;
        }

        .payment-content {
            grid-template-columns: 1fr;
        }

        .qris-section {
            padding: 20px 15px;
        }

        .detail-section {
            padding: 20px 17px;
        }

        .top-header {
            padding: 13px 16px;
        }
    }

    @media (max-width: 380px) {
        .qr-box img {
            width: 145px;
            height: 145px;
        }

        .detail-section h2 {
            font-size: 18px;
        }

        .queue-number {
            font-size: 26px;
        }
    }
</style>

</head><body>
<div class="payment-wrapper"><div class="top-header">
    <div class="brand">Bakso<span>Ku</span></div>

    <div class="secure-small">
        <i data-lucide="lock-keyhole"></i>
        Pembayaran Digital
    </div>
</div>

<div class="payment-content">

    <div class="qris-section">
        <h1>Bayar dengan QRIS</h1>

        <p class="subtitle">
            Scan QR berikut menggunakan aplikasi pembayaran kamu.
        </p>

        <div class="qr-box">
            <img
                src="{{ asset('images/jualan qr.png') }}"
                alt="QRIS BaksoKu"
            >
        </div>

        <p class="scan-text">
            <i data-lucide="smartphone"></i>
            Scan QR untuk melakukan pembayaran
        </p>

        <p class="simulation">
            QRIS ini merupakan simulasi pembayaran
            untuk website BaksoKu.
        </p>
    </div>

    <div class="detail-section">

        <h2>Konfirmasi Pembayaran</h2>

        <form
            id="form-pembayaran"
            action="{{ route('checkout.store') }}"
            method="POST"
        >
            @csrf

            <div class="customer-field">
                <label for="nama_pelanggan">Nama Pelanggan</label>

                <input
                    type="text"
                    id="nama_pelanggan"
                    name="nama_pelanggan"
                    value="{{ old('nama_pelanggan') }}"
                    placeholder="Masukkan nama kamu"
                    maxlength="100"
                    autocomplete="name"
                    required
                >

                @error('nama_pelanggan')
                    <div class="customer-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="queue-box">
                <div class="queue-label">
                    Nomor Antrean Pesanan Kamu
                </div>

                <div class="queue-number">
                    #{{ $nomorAntrian }}
                </div>

                <div class="queue-date">
                    {{ now()->translatedFormat('d F Y') }}
                </div>

                <div class="queue-info">
                    Satu nomor antrean berlaku untuk seluruh
                    menu dalam satu pesanan.
                </div>
            </div>

            <div class="order-box">
                <div class="order-title">
                    <i data-lucide="shopping-cart"></i>
                    Detail Pesanan
                </div>

                @foreach ($cart as $item)
                    <div class="order-item">

                        <div class="order-item-top">
                            <span class="order-name">
                                {{ $item['nama_menu'] }}
                            </span>

                            <span class="order-subtotal">
                                Rp{{ number_format(
                                    $item['harga'] * $item['jumlah'],
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </span>
                        </div>

                        <div class="order-detail">
                            <div>
                                {{ $item['jumlah'] }} mangkuk ×
                                Rp{{ number_format(
                                    $item['harga'],
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </div>

                            @if (isset($item['level_pedas']))
                                <div class="detail-line">
                                    <i data-lucide="flame"></i>
                                    <span>Pedas: {{ $item['level_pedas'] }}</span>
                                </div>
                            @endif

                            @if (isset($item['sayur']))
                                <div class="detail-line">
                                    <i data-lucide="sprout"></i>
                                    <span>Sayur: {{ $item['sayur'] }}</span>
                                </div>
                            @endif

                            @if (isset($item['jenis_mie']))
                                <div class="detail-line">
                                    <i data-lucide="utensils"></i>
                                    <span>Jenis mi: {{ $item['jenis_mie'] }}</span>
                                </div>
                            @endif

                            @if (isset($item['topping_tahu']))
                                <div class="detail-line">
                                    <i data-lucide="plus-circle"></i>
                                    <span>
                                        Topping tahu:
                                        {{ $item['topping_tahu'] ? 'Tambah' : 'Tidak' }}
                                    </span>
                                </div>
                            @endif

                            @if (!empty($item['catatan']))
                                <div class="detail-line">
                                    <i data-lucide="notebook-pen"></i>
                                    <span>Catatan: {{ $item['catatan'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="total-row">
                    <span>Total Pembayaran</span>

                    <span class="total-price">
                        Rp{{ number_format($totalHarga, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            <div class="security-box">
                <div class="security-icon">
                    <i data-lucide="shield-check"></i>
                </div>

                <div class="security-text">
                    <strong>Informasi Pembayaran</strong>
                    <span>
                        Pastikan pembayaran sudah dilakukan sebelum konfirmasi.
                    </span>
                </div>
            </div>

            <div class="method-title">Metode Pembayaran</div>

            <div class="selected-method">
                <div class="qris-logo">QRIS</div>

                <div>
                    <strong>QRIS</strong>
                    <span>Pembayaran melalui QRIS</span>
                </div>
            </div>

            <button type="submit" class="pay-button">
                <i data-lucide="check-circle"></i>
                Saya Sudah Membayar
            </button>
        </form>

        <a href="{{ route('cart.index') }}" class="back">
            <i data-lucide="arrow-left"></i>
            Kembali ke Keranjang
        </a>

    </div>
</div>

</div>@include('components.lucide')

</body>
</html>
