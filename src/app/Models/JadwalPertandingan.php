<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JadwalPertandingan extends Model
{
    protected $table = 'jadwal_pertandingans';

    protected $fillable = [
        'nomor_event',
        'nama_pertandingan',
        'negara',
        'tanggal_dan_waktu',
        'tanggal_selesai',
        'status',
        'nama_event',
        'perusahaan',
    ];

    public function getStatusAttribute($value)
    {
        if (!$this->tanggal_dan_waktu) {
            return 'BELUM MULAI';
        }

        $now = Carbon::now('Asia/Jakarta');
        $start = Carbon::parse($this->tanggal_dan_waktu);
        $end = $start->copy()->addHours(2); // Assuming the event lasts 2 hours

        if ($now->lt($start)) {
            return 'BELUM MULAI';
        } elseif ($now->between($start, $end)) {
            return 'SEDANG BERLANGSUNG';
        } else {
            return 'SELESAI';
        }
    }
}
