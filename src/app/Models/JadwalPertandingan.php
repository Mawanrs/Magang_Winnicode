<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPertandingan extends Model
{
    protected $table = 'jadwal_pertandingans';

    protected $fillable = [
        'nama_pertandingan',
        'negara',
        'tanggal_dan_waktu',
        'status',
        'nama_event',
    ];

}
