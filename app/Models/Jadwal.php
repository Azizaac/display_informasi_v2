<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $casts = [
        'tanggal' => 'date',
    ];

    protected $fillable = [
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'agenda',
        'lokasi',
        'pic'
    ];
}
