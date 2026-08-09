<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SettingSeeder::class,
            SpmbInfoSeeder::class,
            JurusanSeeder::class,       // harus sebelum SiswaSeeder & JurusanGaleriSeeder
            SiswaSeeder::class,
            JurusanGaleriSeeder::class,
            GuruSeeder::class,
            EkstrakurikulerSeeder::class,
            GaleriSeeder::class,
            BeritaSeeder::class,
            PrestasiSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
