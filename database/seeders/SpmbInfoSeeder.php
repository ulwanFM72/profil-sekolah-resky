<?php

namespace Database\Seeders;

use App\Models\SpmbInfo;
use Illuminate\Database\Seeder;

class SpmbInfoSeeder extends Seeder
{
    public function run(): void
    {
        SpmbInfo::create([
            'judul' => 'SPMB SMK Negeri 1 Cijati Tahun Ajaran 2026/2027',
            'deskripsi' => 'Sistem Penerimaan Murid Baru (SPMB) SMK Negeri 1 Cijati dibuka untuk calon siswa/siswi lulusan SMP/MTs sederajat yang ingin melanjutkan pendidikan kejuruan di salah satu dari 4 kompetensi keahlian unggulan kami.',
            'tanggal_mulai' => '2026-06-01',
            'tanggal_selesai' => '2026-07-15',
            'syarat_pendaftaran' => "Fotokopi Ijazah/SKL SMP/MTs\nFotokopi Kartu Keluarga\nFotokopi Akta Kelahiran\nPas foto 3x4 (3 lembar)\nMengisi formulir pendaftaran",
            'alur_pendaftaran' => "Mengisi formulir pendaftaran online\nMengunggah berkas persyaratan\nVerifikasi berkas oleh panitia\nMengikuti tes/wawancara (jika diperlukan)\nPengumuman kelulusan\nDaftar ulang",
            'biaya_pendaftaran' => 'Gratis (Tanpa Biaya Pendaftaran)',
            'link_pendaftaran' => '#',
        ]);
    }
}
