<?php
// app/Http/Controllers/MenuController.php

// namespace App\Http\Controllers;

// use App\Models\Menu;
// use Illuminate\Http\Request;

// class MenuController extends Controller
// {
//     public function index(Request $request)
//     {
//         // Cek apakah ada input pencarian
//         $search = $request->input('search');

//         // Jika ada pencarian, filter data berdasarkan nama_menu
//         $menu = Menu::when($search, function ($query, $search) {
//             return $query->where('nama_menu', 'like', '%' . $search . '%');
//         })->paginate(10); // Batasi 10 data per halaman

//         return view('menu.index', compact('menu', 'search'));
//     }

//     public function create()
//     {
//         return view('menu.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'id' => 'required|unique:menu,id',
//             'nama_menu' => 'required|string|max:255',
//             'jenis_menu' => 'required|string|max:255',
//             'harga' => 'required|numeric',
//         ]);

//         Menu::create($request->all());

//         return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
//     }

//     public function edit($id)
// {
//     $menu = Menu::findOrFail($menu); // Pastikan data ditemukan
//     return view('menu.edit', compact('menu'));
// }
//     public function update(Request $request, $id_menu)
//     {
//         $request->validate([
//             'nama_menu' => 'required|string|max:255',
//             'jenis_menu' => 'required|string|max:255',
//             'harga' => 'required|numeric',
//         ]);

//         $menu = Menu::findOrFail($id);
//         $menu->update($request->all());

//         return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
//     }

//     public function destroy($id)
//     {
//         $menu = Menu::findOrFail($id);
//         $menu->delete();

//         return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
//     }
// }


namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $menu = Menu::when($search, function ($query, $search) {
            return $query->where('nama_menu', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('menu.index', compact('menu', 'search'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis_menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id); // Pastikan parameter cocok
        return view('menu.update', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'jenis_menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
