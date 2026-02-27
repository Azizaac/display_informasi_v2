<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    protected $fillable = [
        'waktu_mulai',
        'waktu_selesai',
        'agenda',
        'lokasi',
        'pic',
        'instansi',
        'status',
        'jumlah_peserta',
        'no_surat',
    ];
}
