<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carousels = [
            [
                'image_url' => 'https://via.placeholder.com/800x400/FF6B6B/FFFFFF?text=Welcome+to+Our+Campus',
                'caption' => 'Selamat Datang di Kampus Kami',
                'order_index' => 1,
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/800x400/4ECDC4/FFFFFF?text=Academic+Excellence',
                'caption' => 'Kecemerlangan Akademik',
                'order_index' => 2,
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/800x400/45B7D1/FFFFFF?text=Innovation+Center',
                'caption' => 'Pusat Inovasi',
                'order_index' => 3,
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/800x400/96CEB4/FFFFFF?text=Student+Activities',
                'caption' => 'Kegiatan Mahasiswa',
                'order_index' => 4,
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/800x400/FECA57/FFFFFF?text=Research+&+Development',
                'caption' => 'Penelitian dan Pengembangan',
                'order_index' => 5,
                'is_active' => 1
            ]
        ];

        foreach ($carousels as $carousel) {
            Carousel::create($carousel);
        }
    }
}
