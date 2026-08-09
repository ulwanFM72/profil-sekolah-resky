<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpmbInfo extends Model
{
    protected $table = 'spmb_infos';

    protected $fillable = [
        'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai',
        'syarat_pendaftaran', 'alur_pendaftaran', 'biaya_pendaftaran',
        'brosur', 'link_pendaftaran',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public static function current(): self
    {
        return static::first() ?? static::create([
            'judul' => 'Penerimaan Peserta Didik Baru',
            'deskripsi' => 'Informasi SPMB akan segera diperbarui oleh admin.',
        ]);
    }
}
