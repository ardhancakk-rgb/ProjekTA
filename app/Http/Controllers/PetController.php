<?php

namespace App\Http\Controllers;

use App\Models\Hewan;

class PetController extends Controller
{
    public function index()
    {
        $hewan = Hewan::with('kategori')->get();

        return view('pets', compact('hewan'));
    }
}
