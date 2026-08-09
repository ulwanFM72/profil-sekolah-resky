<?php

namespace App\Http\Controllers;

use App\Models\SpmbInfo;

class SpmbController extends Controller
{
    public function index()
    {
        $spmb = SpmbInfo::current();

        return view('pages.spmb', compact('spmb'));
    }
}
