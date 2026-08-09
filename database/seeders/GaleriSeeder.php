<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = ['Pembelajaran', 'Upacara', 'Perlombaan', 'Ekstrakurikuler', 'Wisuda', 'Kegiatan Sosial'];

        foreach ($kategori as $kat) {
            for ($i = 1; $i <= 3; $i++) {
                Galeri::create([
                    'judul' => 'Dokumentasi ' . $kat . ' #' . $i,
                    'kategori' => $kat,
                    'gambar' => 'galeri/default.jpg',
                ]);
            }
        }
    }
}
