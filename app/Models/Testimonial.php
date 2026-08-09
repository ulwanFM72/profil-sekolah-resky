<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';

    protected $fillable = ['nama', 'jurusan_kelas', 'foto', 'isi_testimoni'];
}
