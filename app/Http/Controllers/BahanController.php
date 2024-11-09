<?php

// app/Http/Controllers/BahanController.php

namespace App\Http\Controllers;

use App\Models\Bahan;

class BahanController extends Controller
{
    public function index()
    {
        $bahans = Bahan::all();
        return view('stock.index', compact('bahans'));
    }
}

