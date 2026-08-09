<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'nama_sekolah' => 'SMK Negeri 1 Cijati',
            'npsn' => '20123456',
            'status' => 'Negeri',
            'akreditasi' => 'A',
            'tahun_berdiri' => '1985',
            'alamat' => 'Jl. Prof. Moh. Yamin, Cijati, Kabupaten Cianjur, Jawa Barat',
            'email' => 'info@smkn1cijati.sch.id',
            'website' => 'www.smkn1cijati.sch.id',
            'telepon' => '(0263) 123-456',
            'whatsapp' => '6285722022544',
            'maps_lat' => '-7.2602795',
            'maps_lng' => '107.0309619',
            'sejarah' => 'SMK Negeri 1 Cijati didirikan pada tahun 1985 sebagai wujud komitmen pemerintah dalam menyediakan pendidikan kejuruan yang berkualitas. Sejak awal berdiri, sekolah terus berkembang baik dari segi fasilitas, kurikulum, maupun kerja sama industri hingga menjadi salah satu SMK unggulan di daerah ini.',
            'visi' => 'Terwujudnya lulusan yang kompeten, berkarakter, dan berdaya saing di dunia kerja maupun dunia usaha.',
            'misi' => "Menyelenggarakan pembelajaran berbasis kompetensi dan industri.\nMembentuk karakter siswa yang disiplin dan berakhlak mulia.\nMenjalin kerja sama dengan dunia usaha dan dunia industri (DUDI).\nMeningkatkan keterserapan lulusan di dunia kerja.",
            'sambutan_kepala' => 'Selamat datang di SMK Negeri 1 Cijati. Kami berkomitmen mencetak lulusan yang siap kerja, siap kuliah, dan siap berwirausaha, dibekali kompetensi keahlian yang relevan dengan kebutuhan industri saat ini.',
            'nama_kepala_sekolah' => 'Drs. H. Endang Suryana, M.Pd.',
            'jam_operasional' => 'Senin - Jumat: 07:00 - 15:30 WIB',
        ]);
    }
}
