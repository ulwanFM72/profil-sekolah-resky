<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'jurusan' => Jurusan::count(),
            'berita' => Berita::count(),
            'guru' => Guru::count(),
            'siswa' => Siswa::count(),
            'ekstrakurikuler' => Ekstrakurikuler::count(),
            'galeri' => Galeri::count(),
            'prestasi' => Prestasi::count(),
            'testimonial' => Testimonial::count(),
        ];

        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact('counts', 'beritaTerbaru'));
    }
}
