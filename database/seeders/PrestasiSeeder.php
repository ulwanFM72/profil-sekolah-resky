<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Juara 1 Lomba Kompetensi Siswa (LKS) RPL', 'kategori' => 'Akademik', 'tingkat' => 'Provinsi'],
            ['nama' => 'Juara 2 Lomba Debat Bahasa Inggris', 'kategori' => 'Akademik', 'tingkat' => 'Kabupaten'],
            ['nama' => 'Juara 1 Futsal Antar SMK', 'kategori' => 'Non Akademik', 'tingkat' => 'Kabupaten'],
            ['nama' => 'Juara 3 Lomba Kewirausahaan BDP', 'kategori' => 'Akademik', 'tingkat' => 'Provinsi'],
            ['nama' => 'Juara Umum Pramuka Penggalang', 'kategori' => 'Non Akademik', 'tingkat' => 'Kabupaten'],
            ['nama' => 'Juara 1 Lomba Servis Kendaraan Ringan', 'kategori' => 'Akademik', 'tingkat' => 'Nasional'],
            ['nama' => 'Juara 2 Lomba Olahan Pangan Lokal', 'kategori' => 'Akademik', 'tingkat' => 'Provinsi'],
            ['nama' => 'Juara 1 Paskibra Terbaik', 'kategori' => 'Non Akademik', 'tingkat' => 'Kabupaten'],
        ];

        foreach ($data as $item) {
            Prestasi::create([
                'nama_prestasi' => $item['nama'],
                'nama_siswa' => fake()->name(),
                'tingkat' => $item['tingkat'],
                'kategori' => $item['kategori'],
                'tahun' => fake()->numberBetween(2023, 2026),
                'deskripsi' => fake()->sentence(14),
            ]);
        }
    }
}
