<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Menu - BaksoKu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: #fff8f3;
        }

        .navbar {
            background: linear-gradient(135deg, #8b1e1e, #b52b20) !important;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .page-title {
            color: #5a2922;
            font-weight: 800;
        }

        .menu-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: .2s;
        }

        .menu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12) !important;
        }

        .menu-card img {
            height: 220px;
            object-fit: cover;
        }

        .menu-name {
            color: #4a2923;
            font-weight: 700;
        }

        .price {
            color: #a03d22;
            font-size: 20px;
            font-weight: 800;
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

        .btn-edit {
            color: #a03d22;
            border: 1px solid #a03d22;
        }

        .btn-edit:hover {
            background: #a03d22;
            color: white;
        }

        .empty-box {
            background: white;
            border-radius: 16px;
            padding: 50px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark mb-5">
        <div class="container">

            <a href="{{ route('dashboard') }}"
               class="navbar-brand fw-bold fs-4">

                <img
                    src="{{ asset('images/logo bks.png') }}"
                    alt="Logo BaksoKu"
                    class="navbar-logo"
                >

                <span>BaksoKu</span>
            </a>

            <a href="{{ route('dashboard') }}"
               class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left me-1"></i>
                Dashboard
            </a>

        </div>
    </nav>


    <!-- CONTENT -->
    <div class="container pb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="page-title mb-1">
                    Kelola Menu
                </h1>

                <p class="text-muted mb-0">
                    Tambah, edit, dan hapus menu BaksoKu.
                </p>
            </div>

            <a href="{{ route('menus.create') }}"
               class="btn btn-red px-4 py-2">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Menu
            </a>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>
            </div>

        @endif


        <!-- ERROR MESSAGE -->
        @if ($errors->any())

            <div class="alert alert-danger">
                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>
            </div>

        @endif


        <!-- MENU -->
        <div class="row g-4">

            @forelse ($menus as $menu)

                <div class="col-md-6 col-lg-4">

                    <div class="card menu-card h-100 shadow-sm">

                        <!-- FOTO MENU -->
                        <img
                            src="{{ asset('images/' . $menu->foto) }}"
                            class="card-img-top"
                            alt="{{ $menu->nama_menu }}"
                        >

                        <!-- BODY MENU -->
                        <div class="card-body d-flex flex-column">

                            <h5 class="menu-name">
                                {{ $menu->nama_menu }}
                            </h5>

                            <p class="price mb-3">
                                Rp{{ number_format($menu->harga, 0, ',', '.') }}
                            </p>

                            <!-- TOMBOL EDIT DAN HAPUS -->
                            <div class="mt-auto d-flex gap-2">

                                <a href="{{ route('menus.edit', $menu) }}"
                                   class="btn btn-edit flex-fill">
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit
                                </a>

                                <form
                                    action="{{ route('menus.destroy', $menu) }}"
                                    method="POST"
                                    class="flex-fill"
                                    onsubmit="return confirm('Yakin ingin menghapus menu ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger w-100">
                                        <i class="bi bi-trash3 me-1"></i>
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <!-- JIKA BELUM ADA MENU -->
                <div class="col-12">

                    <div class="empty-box text-center shadow-sm">

                        <h4 class="mt-2">
                            Belum ada menu
                        </h4>

                        <p class="text-muted">
                            Silakan tambahkan menu pertama kamu.
                        </p>

                        <a href="{{ route('menus.create') }}"
                           class="btn btn-red">
                            <i class="bi bi-plus-lg me-1"></i>
                            Tambah Menu
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
