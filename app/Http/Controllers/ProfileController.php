<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Setting;

class ProfileController extends Controller
{
    public function index()
    {
        $setting = Setting::current();
        $strukturOrganisasi = Guru::orderBy('jabatan')->take(8)->get();

        return view('pages.profile', compact('setting', 'strukturOrganisasi'));
    }
}
