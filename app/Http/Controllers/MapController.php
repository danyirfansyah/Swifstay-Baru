<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('map'); // Mengarahkan ke file Blade untuk menampilkan peta
    }
}

