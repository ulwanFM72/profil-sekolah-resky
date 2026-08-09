<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $jabatan = ['Kepala Sekolah', 'Wakil Kepala Sekolah', 'Guru Produktif', 'Guru Mata Pelajaran', 'Wali Kelas', 'Staff Tata Usaha', 'Kepala Jurusan'];
        $mapel = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'Produktif RPL', 'Produktif BDP', 'Produktif TO', 'Produktif APHP', 'PJOK', 'PKN', null];

        for ($i = 0; $i < 16; $i++) {
            Guru::create([
                'nama' => fake()->name(),
                'jabatan' => fake()->randomElement($jabatan),
                'nip' => fake()->numerify('19########0#1###'),
                'mata_pelajaran' => fake()->randomElement($mapel),
            ]);
        }
    }
}
