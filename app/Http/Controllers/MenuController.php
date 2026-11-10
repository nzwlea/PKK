<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();

        return view('menus.index', compact('menus'));
    }


    public function create()
    {
        return view('menus.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('images'),
                $namaFoto
            );
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }


    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }


    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $namaFoto = $menu->foto;

        if ($request->hasFile('foto')) {

            if ($menu->foto && file_exists(public_path('images/' . $menu->foto))) {
                unlink(public_path('images/' . $menu->foto));
            }

            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('images'),
                $namaFoto
            );
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'foto' => $namaFoto,
        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }


    public function destroy(Menu $menu)
    {
        if ($menu->foto && file_exists(public_path('images/' . $menu->foto))) {
            unlink(public_path('images/' . $menu->foto));
        }

        $menu->delete();

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}
