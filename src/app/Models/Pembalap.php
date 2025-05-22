<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembalap extends Model
{
    protected $table = 'pembalaps';

    protected $fillable = [
        'tag_name',
        'name',
        'flag_image',
        'flag_name',
        'avatar_url',
        'team',
    ];
}
