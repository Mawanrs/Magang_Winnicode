<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title', 'desc', 'thumbnail', 'youtube_url', 'duration', 'slug'
    ];

    protected static function boot()
{
    parent::boot();
    static::saving(function ($model) {
        if (empty($model->slug) && !empty($model->title)) {
            $model->slug = \Str::slug($model->title) . '-' . uniqid();
        }
    });
}
}
