<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'certification',
        'organization',
        'date',
        'images',
        'category',
    ];

    protected $casts = [
        'date' => 'datetime',
        'images' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
