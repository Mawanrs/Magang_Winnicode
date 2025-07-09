<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembalap extends Model
{
    protected $table = 'pembalaps';

    protected $fillable = [
        'kategori',
        'kelas',
        'rider_number',
        'rider_name',
        'team',
        'country_code',
        'avatar_url',
        'flag_image',
    ];
}
