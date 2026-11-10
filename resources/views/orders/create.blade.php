<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesan {{ $menu->nama_menu }} - BaksoKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #fff8f0;
            color: #3e2723;
        }

        .container {
            max-width: 650px;
            margin: 50px auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,.12);
        }

        .foto {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        h1 {
            color: #6d2c1d;
            margin-bottom: 8px;
        }

        .harga {
            color: #a03d22;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 2px solid #e6d3c4;
            border-radius: 9px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 50px;
            background: #a03d22;
            color: white;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #6d2c1d;
        }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6d2c1d;
            text-decoration: none;
        }

        .info {
            background: #fff3e8;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            color: #6d4c41;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        @if ($menu->foto)
            <img
                src="{{ asset('images/' . $menu->foto) }}"
                alt="{{ $menu->nama_menu }}"
                class="foto"
            >
        @endif

        <h1>{{ $menu->nama_menu }}</h1>

        <div class="harga">
            Rp{{ number_format($menu->harga, 0, ',', '.') }}
        </div>

        <div class="info">
            Silakan pilih jumlah pesanan terlebih dahulu.
            Setelah itu kamu akan diarahkan ke tahap pembayaran.
        </div>

        <form action="{{ route('orders.store', $menu) }}" method="POST">

            @csrf

            <label for="jumlah">
                Jumlah Pesanan
            </label>

            <input
                type="number"
                name="jumlah"
                id="jumlah"
                min="1"
                value="1"
                required
            >

            <button type="submit" class="btn">
                Lanjut ke Pembayaran
            </button>

        </form>

        <a href="{{ url('/') }}" class="kembali">
            ← Kembali ke Beranda
        </a>

    </div>

</div>

</body>
</html>
