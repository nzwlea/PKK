<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function customize(Menu $menu)
    {
        return view('customize.index', compact('menu'));
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Menu $menu)
    {
        $cart = session()->get('cart', []);

        $id = (string) $menu->id;

        if (isset($cart[$id])) {
            $cart[$id]['jumlah']++;
        } else {
            $cart[$id] = [
                'id' => $menu->id,
                'nama_menu' => $menu->nama_menu,
                'harga' => $menu->harga,
                'foto' => $menu->foto,
                'jumlah' => 1,
                'level_pedas' => 'Sedang',
                'sayur' => 'Pakai',
                'jenis_mie' => 'Mie kuning',
                'topping_tahu' => 0,
                'catatan' => '',
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', $menu->nama_menu . ' berhasil ditambahkan ke keranjang.');
    }

    public function addCustomized(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'level_pedas' => 'required|in:Tidak pedas,Sedang,Pedas',
            'sayur' => 'required|in:Pakai,Tanpa sayur',
            'jenis_mie' => 'required|array|min:1',
            'jenis_mie.*' => 'required|in:Mie kuning,Bihun,Soun',
            'topping_tahu' => 'required|in:0,1',
            'catatan' => 'nullable|string|max:500',
        ]);

        $menu = Menu::findOrFail($validated['menu_id']);

        $cart = session()->get('cart', []);

        // Gunakan ID unik agar pesanan dengan kustomisasi berbeda
        // tetap menjadi item terpisah di keranjang.
        $cartId = (string) Str::uuid();

        $cart[$cartId] = [
            'id' => $menu->id,
            'nama_menu' => $menu->nama_menu,
            'harga' => $menu->harga,
            'foto' => $menu->foto,
            'jumlah' => 1,
            'level_pedas' => $validated['level_pedas'],
            'sayur' => $validated['sayur'],
            'jenis_mie' => implode(', ', $validated['jenis_mie']),
            'topping_tahu' => (int) $validated['topping_tahu'],
            'catatan' => $validated['catatan'] ?? '',
        ];

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Bakso berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] = (int) $request->jumlah;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Menu berhasil dihapus dari keranjang.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
