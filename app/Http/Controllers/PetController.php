<?php

namespace App\Http\Controllers;

use App\Models\Hewan;

class PetController extends Controller
{
    public function index()
    {
        $hewan = Hewan::all();
        return view('pets', compact('hewan'));
    }
}
