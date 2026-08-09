<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama', 'singkatan', 'slug', 'kepala_jurusan', 'deskripsi', 'gambar_sampul'];

    public function galeri()
    {
        return $this->hasMany(JurusanGaleri::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
