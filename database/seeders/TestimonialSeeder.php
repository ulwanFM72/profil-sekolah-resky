<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            Testimonial::create([
                'nama' => fake()->name(),
                'jurusan_kelas' => fake()->randomElement(['XII RPL 1', 'XII BDP 2', 'Alumni TO 2023', 'Alumni APHP 2022']),
                'isi_testimoni' => fake()->paragraph(2),
            ]);
        }
    }
}
