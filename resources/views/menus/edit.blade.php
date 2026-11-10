<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Menu - BaksoKu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff8f3;
        }

        .navbar {
            background: linear-gradient(135deg, #8b1e1e, #b52b20);
        }

        .page-title {
            color: #5a2922;
            font-weight: 800;
        }

        .form-card {
            max-width: 650px;
            margin: 0 auto;
            background: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
            color: #5a2922;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 14px;
        }

        .form-control:focus {
            border-color: #a03d22;
            box-shadow: 0 0 0 0.2rem rgba(160, 61, 34, 0.15);
        }

        .btn-red {
            background: #a03d22;
            color: white;
            border: none;
        }

        .btn-red:hover {
            background: #8b321c;
            color: white;
        }

        .btn-back {
            color: #a03d22;
            border: 1px solid #a03d22;
        }

        .btn-back:hover {
            background: #a03d22;
            color: white;
        }

        .current-photo {
            width: 180px;
            height: 140px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #eee;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark mb-5">
    <div class="container">

        <a href="{{ route('dashboard') }}"
           class="navbar-brand fw-bold fs-4">
            🍜 BaksoKu
        </a>

        <a href="{{ route('menus.index') }}"
           class="btn btn-light btn-sm">
            ← Kembali
        </a>

    </div>
</nav>


<!-- CONTENT -->

<div class="container pb-5">

    <div class="form-card p-4 p-md-5">

        <div class="text-center mb-4">

            <h1 class="page-title">
                Edit Menu
            </h1>

            <p class="text-muted mb-0">
                Ubah informasi menu BaksoKu.
            </p>

        </div>


        <!-- ERROR -->

        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM -->

        <form action="{{ route('menus.update', $menu) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @method('PUT')


            <!-- NAMA -->

            <div class="mb-4">

                <label for="nama_menu"
                       class="form-label">
                    Nama Menu
                </label>

                <input
                    type="text"
                    name="nama_menu"
                    id="nama_menu"
                    class="form-control"
                    value="{{ old('nama_menu', $menu->nama_menu) }}"
                    required
                >

            </div>


            <!-- HARGA -->

            <div class="mb-4">

                <label for="harga"
                       class="form-label">
                    Harga
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        name="harga"
                        id="harga"
                        class="form-control"
                        value="{{ old('harga', $menu->harga) }}"
                        min="0"
                        required
                    >

                </div>

            </div>


            <!-- FOTO SEKARANG -->

            <div class="mb-4">

                <label class="form-label">
                    Foto Saat Ini
                </label>

                <div>

                    @if ($menu->foto)

                        <img
                            src="{{ asset('images/' . $menu->foto) }}"
                            alt="{{ $menu->nama_menu }}"
                            class="current-photo"
                        >

                    @else

                        <p class="text-muted">
                            Belum ada foto.
                        </p>

                    @endif

                </div>

            </div>


            <!-- GANTI FOTO -->

            <div class="mb-4">

                <label for="foto"
                       class="form-label">
                    Ganti Foto
                </label>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="form-control"
                    accept="image/*"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

            </div>


            <!-- BUTTON -->

            <div class="d-flex gap-2 justify-content-end">

                <a href="{{ route('menus.index') }}"
                   class="btn btn-back px-4">
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-red px-4">
                    💾 Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
