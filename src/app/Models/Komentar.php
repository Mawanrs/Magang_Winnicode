<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
     protected $table = 'komentars';

    protected $fillable = [
        'news_id', 'nama', 'email', 'isi',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
