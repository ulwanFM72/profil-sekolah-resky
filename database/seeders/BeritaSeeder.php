<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $judulList = [
            'Penerimaan Rapor Semester Ganjil Tahun Ajaran 2026/2027',
            'Siswa RPL Raih Juara Kompetisi Coding Tingkat Provinsi',
            'Kunjungan Industri Jurusan Teknik Otomotif ke Bengkel Resmi',
            'Workshop Digital Marketing untuk Siswa Jurusan BDP',
            'Panen Raya Hasil Praktik Jurusan APHP',
            'Pelaksanaan Uji Kompetensi Keahlian (UKK) 2026',
            'Sosialisasi SPMB Tahun Ajaran 2026/2027',
            'Peringatan Hari Kemerdekaan RI di Lingkungan Sekolah',
            'Pelatihan Kewirausahaan bagi Siswa Kelas XII',
        ];

        foreach ($judulList as $judul) {
            Berita::create([
                'judul' => $judul,
                'slug' => Str::slug($judul) . '-' . fake()->unique()->numberBetween(100, 999),
                'kategori' => fake()->randomElement(['Akademik', 'Kegiatan', 'Pengumuman', 'Prestasi']),
                'isi' => fake()->paragraphs(5, true),
                'tanggal' => fake()->dateTimeBetween('-4 months', 'now'),
            ]);
        }
    }
}
