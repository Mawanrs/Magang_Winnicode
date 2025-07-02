<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuaca extends Model
{
    protected $fillable = [
        'cuaca',
        'suhu_udara',
        'kondisi_lintasan',
        'kelembapan',
        'suhu_tanah'
    ];
}
