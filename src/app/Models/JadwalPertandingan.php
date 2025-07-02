<?php

namespace App\Models;
use Carbon\Carbon;
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

    public function getStatusAttribute($value)
    {
        if (!$this->tanggal_dan_waktu) {
            return 'BELUM MULAI';
        }

        $now = Carbon::now();
        $start = Carbon::parse($this->tanggal_dan_waktu);
        $end = $start->copy()->addHours(2); // misalnya pertandingan berlangsung 2 jam

        if ($now->lt($start)) {
            return 'BELUM MULAI';
        } elseif ($now->between($start, $end)) {
            return 'BERLANGSUNG';
        } else {
            return 'SELESAI';
        }
    }
}
