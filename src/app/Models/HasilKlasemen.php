<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilKlasemen extends Model
{
    protected $table = 'hasil_klasemens';

    protected $fillable = [
        'position',
        'points',
        'avatar_url',
        'rider_number',
        'rider_name',
        'country_code',
        'team',
        'gap_time',
    ];
}
