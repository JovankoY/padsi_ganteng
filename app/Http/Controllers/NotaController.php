<?php

// app/Http/Controllers/NotaController.php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all(); // Mengambil semua data dari tabel nota
        return view('statement.index', compact('notas')); // Pastikan ini sesuai dengan nama file tampilan
    }
}

