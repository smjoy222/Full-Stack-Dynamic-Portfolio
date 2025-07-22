<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'user_id',
        'portfolio',
        'address',
        'description',
        'designation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
