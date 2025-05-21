<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPertandingan extends Model
{
    protected $table = 'jadwal_pertandingans';

    protected $fillable = [
        'tanggal_dan_waktu',
        'nomor',
        'nama_negara',
        'sponsor',
    ];

    public $timestamps = true;
}
