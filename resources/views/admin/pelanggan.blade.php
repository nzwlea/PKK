<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pelanggan - BaksoKu</title>

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

        /* SIDEBAR */

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
            border-bottom: 1px solid rgba(255,255,255,0.2);
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
            font-size: 11px;
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
            transition: 0.2s;
        }

        .sidebar a i {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,0.15);
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
            background: rgba(255,255,255,0.1);
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

        .logout button i {
            font-size: 18px;
        }

        .logout button:hover {
            background: rgba(255,255,255,0.2);
        }

        /* MAIN */

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

        /* CONTENT */

        .content {
            padding: 35px 40px;
            max-width: 1250px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            color: #4a2923;
        }

        .page-header p {
            color: #8d7770;
            margin-top: 5px;
        }

        /* TABLE */

        .table-card {
            background: white;
            border: 1px solid #f0e3de;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(62,39,35,0.06);
            overflow: hidden;
        }

        .table-header {
            padding: 22px 25px;
            border-bottom: 1px solid #eee;
        }

        .table-header h2 {
            font-size: 20px;
            color: #4a2923;
        }

        .table-header p {
            color: #917c75;
            font-size: 13px;
            margin-top: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #fff5f0;
            color: #6d4c41;
            font-size: 13px;
            text-align: left;
            padding: 15px 20px;
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid #f1e7e3;
            color: #4a2923;
            font-size: 14px;
        }

        tr:hover td {
            background: #fffaf7;
        }

        .number {
            width: 60px;
            color: #927b74;
        }

        .name {
            font-weight: 600;
        }

        .email {
            color: #6f5b54;
        }

        .badge {
            display: inline-block;
            background: #fff0eb;
            color: #a03d22;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #917c75;
        }

        .empty i {
            display: block;
            font-size: 40px;
            color: #c9aaa0;
            margin-bottom: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
            }

            .content {
                padding: 25px 20px;
            }

            .topbar {
                padding: 0 25px;
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
                padding: 20px 15px;
            }

            .topbar {
                padding: 0 18px;
            }

            table {
                min-width: 600px;
            }

            .table-card {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">
            <h1>
                Bakso<span>Ku</span>
            </h1>

            <p>
                Admin Dashboard
            </p>
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('menus.index') }}">
            <i class="bi bi-egg-fried"></i>
            <span>Kelola Menu</span>
        </a>

        <a href="{{ route('admin.orders') }}">
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


    <!-- MAIN -->

    <main class="main">

        <header class="topbar">

            <div>
                <h2>
                    Pelanggan
                </h2>

                <p>
                    Lihat data pelanggan BaksoKu.
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

            <div class="page-header">

                <h1>
                    Data Pelanggan
                </h1>

                <p>
                    Daftar pengguna yang telah terdaftar di BaksoKu.
                </p>

            </div>


            <div class="table-card">

                <div class="table-header">

                    <h2>
                        Daftar Pelanggan
                    </h2>

                    <p>
                        Total {{ $pelanggan->count() }} pelanggan terdaftar.
                    </p>

                </div>


                @if ($pelanggan->count() > 0)

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Terdaftar</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($pelanggan as $index => $user)

                                <tr>

                                    <td class="number">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="name">
                                        {{ $user->name }}
                                    </td>

                                    <td class="email">
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        <span class="badge">
                                            Pelanggan
                                        </span>
                                    </td>

                                    <td>
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty">

                        <i class="bi bi-people"></i>

                        <strong>
                            Belum ada pelanggan
                        </strong>

                        <p>
                            Data pelanggan yang mendaftar akan muncul di sini.
                        </p>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>

</body>
</html>
