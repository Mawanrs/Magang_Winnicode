<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'nickname',
        'gender',
        'birth_date',
        'phone_number',
        'profile_picture',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
