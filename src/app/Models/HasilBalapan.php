<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilBalapan extends Model
{
    protected $table = 'hasil_balapans';

    protected $fillable = [
            'kategori', 'grand_prix', 'tahun', 'pembalap', 'tim',
            'posisi', 'event', 'waktu_gap', 'diklasifikasikan',
        ];
}
