<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlasemenTim extends Model
{
    protected $table = 'klasemen_tims';

    protected $fillable = [
        'kategori','pembalap','tahun', 'tim', 'poin', 'posisi','gap'
    ];
}
