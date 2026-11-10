<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pesanan - BaksoKu</title>

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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        /* HEADER */

        .header {
            background: linear-gradient(
                135deg,
                #8b1e1e,
                #b52b20
            );

            color: white;

            padding: 28px 32px;

            border-radius: 18px;

            margin-bottom: 25px;

            box-shadow:
                0 8px 25px rgba(139,30,30,.18);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 30px;
        }

        .header p {
            margin-top: 5px;
            color: #ffe8df;
            font-size: 14px;
        }

        .back-btn {
            display: inline-block;

            background: rgba(255,255,255,.15);

            color: white;

            padding: 10px 17px;

            border-radius: 10px;

            text-decoration: none;

            font-weight: 600;

            transition: .2s;
        }

        .back-btn:hover {
            background: rgba(255,255,255,.25);
        }

        /* CONTENT */

        .card {
            background: white;

            border-radius: 18px;

            padding: 25px;

            border: 1px solid #f0e3de;

            box-shadow:
                0 5px 18px rgba(62,39,35,.06);
        }

        .card-title {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }

        .card-title h2 {
            color: #4a2923;

            font-size: 21px;
        }

        .total-order {
            background: #fff0eb;

            color: #a03d22;

            padding: 8px 14px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: 700;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 750px;
        }

        thead {
            background: #fff8f3;
        }

        th {
            text-align: left;

            padding: 15px 12px;

            color: #6d4c41;

            font-size: 13px;

            border-bottom: 2px solid #eadbd5;
        }

        td {
            padding: 16px 12px;

            border-bottom: 1px solid #f0e3de;

            font-size: 14px;

            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fffaf7;
        }

        /* MENU */

        .menu-name {
            font-weight: 700;

            color: #4a2923;
        }

        .menu-price {
            color: #8d7770;

            font-size: 13px;

            margin-top: 3px;
        }

        /* CUSTOMER */

        .customer {
            font-weight: 600;

            color: #4a2923;
        }

        .customer-email {
            color: #927b74;

            font-size: 12px;

            margin-top: 3px;
        }

        /* STATUS */

        .status {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 700;

            text-transform: capitalize;
        }

        .status.pending {
            background: #fff4d6;

            color: #98701c;
        }

        .status.paid {
            background: #e3f6e8;

            color: #397344;
        }

        .status.completed {
            background: #e3f6e8;

            color: #397344;
        }

        .status.cancelled {
            background: #fde5e5;

            color: #a33a3a;
        }

        /* EMPTY */

        .empty {
            text-align: center;

            padding: 70px 20px;

            color: #927b74;
        }

        .empty-icon {
            font-size: 55px;

            margin-bottom: 12px;
        }

        .empty h3 {
            color: #6d4c41;

            margin-bottom: 6px;
        }

        .empty p {
            font-size: 14px;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .container {
                padding: 20px 15px;
            }

            .header-top {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            .card {
                padding: 18px;
            }

            .card-title {
                align-items: flex-start;

                gap: 10px;

                flex-direction: column;
            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- HEADER -->

    <div class="header">

        <div class="header-top">

            <div>

                <h1>
                    📦 Pesanan BaksoKu
                </h1>

                <p>
                    Kelola dan lihat seluruh pesanan pelanggan.
                </p>

            </div>


            <a
                href="{{ route('dashboard') }}"
                class="back-btn"
            >
                ← Dashboard
            </a>

        </div>

    </div>


    <!-- PESANAN -->

    <div class="card">


        <div class="card-title">

            <h2>
                Daftar Pesanan
            </h2>

            <div class="total-order">

                {{ $orders->count() }}
                Pesanan

            </div>

        </div>


        @if ($orders->count() > 0)


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Pelanggan
                            </th>

                            <th>
                                Menu
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Tanggal
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    @foreach ($orders as $index => $order)

                        <tr>


                            <td>
                                {{ $index + 1 }}
                            </td>


                            <!-- PELANGGAN -->

                            <td>

                                <div class="customer">

                                    {{ $order->user->name ?? 'Pelanggan' }}

                                </div>

                                @if ($order->user)

                                    <div class="customer-email">

                                        {{ $order->user->email }}

                                    </div>

                                @endif

                            </td>


                            <!-- MENU -->

                            <td>

                                <div class="menu-name">

                                    {{ $order->menu->nama_menu ?? 'Menu dihapus' }}

                                </div>

                                @if ($order->menu)

                                    <div class="menu-price">

                                        Rp{{ number_format(
                                            $order->menu->harga,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </div>

                                @endif

                            </td>


                            <!-- JUMLAH -->

                            <td>

                                {{ $order->jumlah }}

                            </td>


                            <!-- TOTAL -->

                            <td>

                                <strong>

                                    Rp{{ number_format(
                                        $order->total_harga,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </strong>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <span
                                    class="status {{ $order->status }}"
                                >

                                    {{ $order->status }}

                                </span>

                            </td>


                            <!-- TANGGAL -->

                            <td>

                                {{ $order->created_at->format('d/m/Y') }}

                            </td>


                        </tr>

                    @endforeach


                    </tbody>

                </table>

            </div>


        @else


            <!-- BELUM ADA PESANAN -->

            <div class="empty">

                <div class="empty-icon">
                    📦
                </div>

                <h3>
                    Belum ada pesanan
                </h3>

                <p>
                    Pesanan pelanggan akan muncul di halaman ini.
                </p>

            </div>


        @endif


    </div>


</div>


</body>

</html>
