<?php
// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|unique:menu,id_menu',
            'nama_menu' => 'required|string|max:255',
            'jenis_menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        Menu::create([
            'id_menu' => $request->id_menu,
            'nama_menu' => $request->nama_menu,
            'jenis_menu' => $request->jenis_menu,
            'harga' => $request->harga,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.update', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis_menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id_menu);
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'jenis_menu' => $request->jenis_menu,
            'harga' => $request->harga,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }
        // Metode lain seperti index, create, store, dll.
        public function destroy($id)
        {
            // Cari menu berdasarkan ID
            $menu = Menu::findOrFail($id);
            
            // Hapus menu
            $menu->delete();
    
            // Redirect setelah berhasil dihapus
            return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
        }
    }