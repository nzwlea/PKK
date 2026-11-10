<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $totalHarga = 0;

        foreach ($cart as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
        }

        $nomorAntrian = $this->nomorAntrianBerikutnya();

        return view('orders.payment', compact(
            'cart',
            'totalHarga',
            'nomorAntrian'
        ));
    }

    private function nomorAntrianBerikutnya(): string
    {
        $hariIni = now()->toDateString();

        $counter = DB::table('daily_queue_counters')
            ->where('queue_date', $hariIni)
            ->first();

        $nomor = $counter ? $counter->last_number + 1 : 1;

        return 'A' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $namaPelanggan = trim($validated['nama_pelanggan']);

        $nomorAntrian = DB::transaction(function () use (
            $cart,
            $namaPelanggan
        ) {
            $hariIni = now()->toDateString();

            DB::table('daily_queue_counters')->insertOrIgnore([
                'queue_date' => $hariIni,
                'last_number' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $counter = DB::table('daily_queue_counters')
                ->where('queue_date', $hariIni)
                ->lockForUpdate()
                ->first();

            $nomor = $counter->last_number + 1;

            DB::table('daily_queue_counters')
                ->where('queue_date', $hariIni)
                ->update([
                    'last_number' => $nomor,
                    'updated_at' => now(),
                ]);

            foreach ($cart as $item) {
                Order::create([
                    'user_id' => Auth::id(),
                    'menu_id' => $item['id'],
                    'jumlah' => $item['jumlah'],
                    'total_harga' => $item['harga'] * $item['jumlah'],
                    'status' => 'pending',
                    'nomor_antrian' => $nomor,
                    'nama_pelanggan' => $namaPelanggan,
                    'level_pedas' => $item['level_pedas'] ?? null,
                    'sayur' => $item['sayur'] ?? null,
                    'jenis_mie' => $item['jenis_mie'] ?? null,
                    'topping_tahu' => $item['topping_tahu'] ?? false,
                    'catatan' => $item['catatan'] ?? null,
                    'status_pembayaran' => 'pending',
                ]);
            }

            return 'A' . str_pad(
                $nomor,
                3,
                '0',
                STR_PAD_LEFT
            );
        });

        session()->forget('cart');

        return redirect()->route('home')->with(
            'success',
            'Pesanan atas nama ' . $namaPelanggan .
            ' berhasil dibuat. Nomor antrean kamu adalah ' .
            $nomorAntrian
        );
    }

    public function adminOrders()
    {
        $orders = Order::with(['user', 'menu'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($order) {
                return $order->created_at->toDateString()
                    . '-' . $order->nomor_antrian;
            });

        return view('admin.orders', compact('orders'));
    }
}
