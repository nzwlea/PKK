<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalMenu = Menu::count();

        $totalPesanan = Order::count();

        $totalPelanggan = User::where('role', '!=', 'admin')->count();

        return view('admin.dashboard', [
            'totalMenu' => $totalMenu,
            'totalPesanan' => $totalPesanan,
            'totalPelanggan' => $totalPelanggan,
        ]);
    }

    public function pelanggan()
    {
        $pelanggan = User::where('role', '!=', 'admin')
            ->latest()
            ->get();

        return view('admin.pelanggan', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function home()
    {
        $menus = Menu::latest()->get();

        return view('welcome', [
            'menus' => $menus
        ]);
    }
}
