<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'nama_sekolah', 'npsn', 'status', 'akreditasi', 'tahun_berdiri',
        'alamat', 'email', 'website', 'telepon', 'whatsapp',
        'maps_lat', 'maps_lng', 'sejarah', 'visi', 'misi',
        'sambutan_kepala', 'nama_kepala_sekolah', 'logo', 'hero_image', 'jam_operasional',
    ];

    // Selalu ambil / buat baris tunggal (singleton)
    public static function current(): self
    {
        return static::first() ?? static::create([
            'nama_sekolah' => 'Nama Sekolah Anda',
        ]);
    }
}
