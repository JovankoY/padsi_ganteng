<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function users()
    {
        return view('users.index');
    }

    public function stock()
    {
        return view('stock.index');
    }
    public function transaktions()
    {
        return view('transaktions.index');
    }
    public function laporan()
    {
        return view('laporan.index');
    }
    public function loyality()
    {
        return view('loyality.index');
    }
}
