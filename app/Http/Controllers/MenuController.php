<?php
// app/Http/Controllers/MenuController.php
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all(); // Fetch all menu items
        return view('menus.index', compact('menu')); // Pass data to the view
    }

    
}

