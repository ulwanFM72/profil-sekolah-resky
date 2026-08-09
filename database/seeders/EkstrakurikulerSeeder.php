<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Pramuka', 'kategori' => 'Kepemimpinan', 'jadwal' => 'Sabtu, 08:00 - 11:00'],
            ['nama' => 'Futsal', 'kategori' => 'Olahraga', 'jadwal' => 'Selasa, 15:00 - 17:00'],
            ['nama' => 'Basket', 'kategori' => 'Olahraga', 'jadwal' => 'Kamis, 15:00 - 17:00'],
            ['nama' => 'Paskibra', 'kategori' => 'Kepemimpinan', 'jadwal' => 'Jumat, 14:00 - 16:00'],
            ['nama' => 'PMR', 'kategori' => 'Sosial', 'jadwal' => 'Rabu, 15:00 - 17:00'],
            ['nama' => 'English Club', 'kategori' => 'Akademik', 'jadwal' => 'Senin, 15:00 - 16:30'],
            ['nama' => 'Robotik', 'kategori' => 'Akademik', 'jadwal' => 'Selasa, 15:00 - 17:00'],
            ['nama' => 'Seni Tari', 'kategori' => 'Seni', 'jadwal' => 'Rabu, 14:00 - 16:00'],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::create([
                'nama' => $item['nama'],
                'pembina' => fake()->name(),
                'jadwal' => $item['jadwal'],
                'kategori' => $item['kategori'],
                'deskripsi' => fake()->paragraph(3),
            ]);
        }
    }
}
