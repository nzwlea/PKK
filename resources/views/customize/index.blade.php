<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customisasi Menu - BaksoKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #faf7f2;
            color: #3e2723;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #5d4037;
            padding: 18px 7%;
            color: white;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .brand span {
            color: #ffcc80;
        }

        .container-custom {
            max-width: 720px;
            margin: 35px auto;
            padding: 0 18px;
        }

        .card-custom {
            background: white;
            padding: 28px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(62, 39, 35, .08);
        }

        .menu-image {
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 20px;
        }

        .price {
            color: #8d6e63;
            font-size: 18px;
            font-weight: bold;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin: 24px 0 12px;
        }

        .option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border: 1px solid #e6ddd5;
            border-radius: 10px;
            margin-bottom: 9px;
            cursor: pointer;
            transition: .2s;
        }

        .option:has(input:checked) {
            border-color: #795548;
            background: #f7eee7;
        }

        .option input {
            accent-color: #795548;
            flex-shrink: 0;
        }

        .option span {
            flex: 1;
        }

        .helper-text {
            font-size: 13px;
            color: #8d6e63;
            margin: 0 0 12px;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            background: #5d4037;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-weight: bold;
            margin-top: 24px;
            transition: .2s;
        }

        .btn-submit:hover {
            background: #795548;
            color: white;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #5d4037;
            text-decoration: none;
            margin-bottom: 18px;
        }

        [data-lucide] {
            width: 19px;
            height: 19px;
            stroke-width: 1.8;
            vertical-align: middle;
        }

        @media (max-width: 480px) {
            .card-custom {
                padding: 20px;
            }

            .menu-image {
                height: 200px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ route('home') }}" class="brand">
        Bakso<span>Ku</span>
    </a>
</nav>

<div class="container-custom">
    <a href="{{ route('home') }}" class="btn-back">
        <i data-lucide="arrow-left"></i>
        Kembali ke menu
    </a>

    <div class="card-custom">
        @if ($menu->foto)
            <img
                src="{{ asset('images/' . $menu->foto) }}"
                alt="{{ $menu->nama_menu }}"
                class="menu-image"
            >
        @endif

        <h2 class="fw-bold">{{ $menu->nama_menu }}</h2>

        <p class="price">
            Rp{{ number_format($menu->harga, 0, ',', '.') }}
        </p>

        <p class="text-muted">
            Pilih kustomisasi sesuai selera kamu.
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa pilihan kamu:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cart.add-customized') }}" method="POST">
            @csrf

            <input type="hidden" name="menu_id" value="{{ $menu->id }}">

            <!-- LEVEL PEDAS -->
            <div class="section-title">
                <i data-lucide="flame"></i>
                Level pedas
            </div>

            @foreach (['Tidak pedas', 'Sedang', 'Pedas'] as $level)
                <label class="option">
                    <input
                        type="radio"
                        name="level_pedas"
                        value="{{ $level }}"
                        required
                        {{ old('level_pedas', 'Sedang') === $level ? 'checked' : '' }}
                    >
                    <span>{{ $level }}</span>
                </label>
            @endforeach

            <!-- SAYUR -->
            <div class="section-title">
                <i data-lucide="sprout"></i>
                Sayur
            </div>

            @foreach (['Pakai', 'Tanpa sayur'] as $pilihanSayur)
                <label class="option">
                    <input
                        type="radio"
                        name="sayur"
                        value="{{ $pilihanSayur }}"
                        required
                        {{ old('sayur', 'Pakai') === $pilihanSayur ? 'checked' : '' }}
                    >
                    <span>{{ $pilihanSayur }}</span>
                </label>
            @endforeach

            <!-- JENIS MI: BISA PILIH LEBIH DARI SATU -->
            <div class="section-title">
                <i data-lucide="utensils"></i>
                Jenis mi
            </div>

            <p class="helper-text">
                Kamu bisa memilih satu atau beberapa jenis mi sekaligus.
            </p>

            @foreach (['Mie kuning', 'Bihun', 'Soun'] as $jenisMi)
                <label class="option">
                    <input
                        type="checkbox"
                        name="jenis_mie[]"
                        value="{{ $jenisMi }}"
                        {{ in_array($jenisMi, old('jenis_mie', ['Mie kuning'])) ? 'checked' : '' }}
                    >
                    <span>{{ $jenisMi }}</span>
                </label>
            @endforeach

            <!-- TOPPING TAHU -->
            <div class="section-title">
                <i data-lucide="plus-circle"></i>
                Tambahan tahu
            </div>

            <label class="option">
                <input
                    type="radio"
                    name="topping_tahu"
                    value="0"
                    required
                    {{ old('topping_tahu', '0') === '0' ? 'checked' : '' }}
                >
                <span>Tidak tambah tahu</span>
            </label>

            <label class="option">
                <input
                    type="radio"
                    name="topping_tahu"
                    value="1"
                    required
                    {{ old('topping_tahu') === '1' ? 'checked' : '' }}
                >
                <span>Tambah tahu</span>
            </label>

            <!-- CATATAN -->
            <div class="section-title">
                <i data-lucide="notebook-pen"></i>
                Catatan tambahan
            </div>

            <textarea
                name="catatan"
                class="form-control"
                rows="3"
                maxlength="500"
                placeholder="Contoh: kuah dipisah, jangan terlalu pedas..."
            >{{ old('catatan') }}</textarea>

            <button type="submit" class="btn-submit">
                <i data-lucide="shopping-cart"></i>
                Tambahkan 1 Mangkuk ke Keranjang
            </button>
        </form>
    </div>
</div>

@include('components.lucide')

</body>
</html>
