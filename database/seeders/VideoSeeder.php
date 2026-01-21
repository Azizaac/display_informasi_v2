<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'title' => 'Profil Kampus',
                'description' => 'Video profil lengkap tentang kampus kami',
                'thumbnail_url' => 'https://via.placeholder.com/320x180/FF6B6B/FFFFFF?text=Profil+Kampus',
                'is_active' => 1
            ],
            [
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'title' => 'Kegiatan Mahasiswa',
                'description' => 'Dokumentasi kegiatan mahasiswa tahun 2025',
                'thumbnail_url' => 'https://via.placeholder.com/320x180/4ECDC4/FFFFFF?text=Kegiatan+Mahasiswa',
                'is_active' => 1
            ]
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
