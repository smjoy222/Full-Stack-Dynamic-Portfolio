<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'github_url',
        'demo_url',
        'images',
        'type',
        'reference',
        'tools',
        'keywords',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'tools' => 'array',
        'keywords' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
