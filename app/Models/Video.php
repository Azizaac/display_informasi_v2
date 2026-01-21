<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'video_url',
        'title',
        'description',
        'thumbnail_url',
        'is_active'
    ];
}
