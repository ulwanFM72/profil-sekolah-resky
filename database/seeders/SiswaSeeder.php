<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $kelasList = ['X', 'XI', 'XII'];
        $rombel = ['A', 'B'];

        foreach (Jurusan::all() as $jurusan) {
            $jumlah = fake()->numberBetween(70, 95);
            for ($i = 0; $i < $jumlah; $i++) {
                Siswa::create([
                    'nama' => fake()->name(),
                    'kelas' => fake()->randomElement($kelasList) . ' ' . $jurusan->singkatan . ' ' . fake()->randomElement($rombel),
                    'jurusan_id' => $jurusan->id,
                ]);
            }
        }
    }
}
