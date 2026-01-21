<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'carousels';
    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'image_url',
        'caption',
        'order_index',
        'is_active'
    ];
}
