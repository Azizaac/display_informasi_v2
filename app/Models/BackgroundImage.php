<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundImage extends Model
{
    use HasFactory;

    protected $table = 'background_images';
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'image_url',
        'position',
        'is_active'
    ];
}
