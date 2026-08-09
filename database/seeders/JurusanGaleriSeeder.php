<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\JurusanGaleri;
use Illuminate\Database\Seeder;

class JurusanGaleriSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Jurusan::all() as $jurusan) {
            for ($i = 1; $i <= 4; $i++) {
                JurusanGaleri::create([
                    'jurusan_id' => $jurusan->id,
                    'judul' => 'Praktik ' . $jurusan->singkatan . ' #' . $i,
                    'gambar' => 'jurusan/default.jpg',
                ]);
            }
        }
    }
}
