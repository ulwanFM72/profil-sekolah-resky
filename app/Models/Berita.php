<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = ['judul', 'slug', 'kategori', 'thumbnail', 'isi', 'tanggal'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getRingkasanAttribute(): string
    {
        return Str::limit(strip_tags($this->isi), 120);
    }
}
