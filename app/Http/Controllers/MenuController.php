<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
{
    
    $menus = Menu::paginate(10); // Atau metode lain untuk mengambil data
    // dd($menus);
    return view('menu.index', compact('menus'));
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

    public function update(Request $request, $id)
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
        $menus = Menu::findOrFail($id);
        // dd($id);
        $menus->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
