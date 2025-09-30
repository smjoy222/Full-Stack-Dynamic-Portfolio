<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'designation',
        'organization',
        'from_date',
        'to_date',
        'description',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
