<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Prestasi;
use App\Models\Setting;
use App\Models\Siswa;
use App\Models\SpmbInfo;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::current();
        $spmb = SpmbInfo::current();

        $statistik = [
            'jumlah_guru' => Guru::count(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_prestasi' => Prestasi::count(),
            'jumlah_ekstrakurikuler' => Ekstrakurikuler::count(),
        ];

        $jurusan = Jurusan::withCount('siswa')->orderBy('nama')->get();
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->take(3)->get();
        $prestasiTerbaru = Prestasi::orderBy('tahun', 'desc')->take(6)->get();
        $galeriTerbaru = Galeri::latest()->take(6)->get();
        $testimonials = Testimonial::inRandomOrder()->take(6)->get();

        return view('pages.home', compact(
            'setting', 'spmb', 'statistik', 'jurusan', 'beritaTerbaru', 'prestasiTerbaru', 'galeriTerbaru', 'testimonials'
        ));
    }
}
