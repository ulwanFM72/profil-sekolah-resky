<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'nama_prestasi', 'nama_siswa', 'tingkat', 'kategori', 'tahun', 'deskripsi', 'gambar',
    ];
}
