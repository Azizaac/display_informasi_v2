<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwals = [
            [
                'tanggal' => '2026-01-20',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '10:00',
                'agenda' => 'Upacara Bendera',
                'lokasi' => 'Lapangan Utama',
                'pic' => 'Pak Budi'
            ],
            [
                'tanggal' => '2026-01-21',
                'waktu_mulai' => '09:00',
                'waktu_selesai' => '11:00',
                'agenda' => 'Kunjungan Industri',
                'lokasi' => 'Aula RnD',
                'pic' => 'Bu Siti'
            ],
            [
                'tanggal' => '2026-01-22',
                'waktu_mulai' => '13:00',
                'waktu_selesai' => '15:00',
                'agenda' => 'Workshop Teknologi',
                'lokasi' => 'Ruang Seminar',
                'pic' => 'Pak Ahmad'
            ],
            [
                'tanggal' => '2026-01-23',
                'waktu_mulai' => '10:00',
                'waktu_selesai' => '12:00',
                'agenda' => 'Rapat Koordinasi',
                'lokasi' => 'Ruang Rapat',
                'pic' => 'Bu Rina'
            ],
            [
                'tanggal' => '2026-01-24',
                'waktu_mulai' => '14:00',
                'waktu_selesai' => '16:00',
                'agenda' => 'Pelatihan Soft Skills',
                'lokasi' => 'Aula Gedung A',
                'pic' => 'Pak Dedi'
            ]
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
