<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('jabatan')->orderBy('nama')->get();

        return view('pages.guru', compact('guru'));
    }
}
