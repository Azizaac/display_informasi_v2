<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BackgroundImage;

class BackgroundImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $backgrounds = [
            [
                'image_url' => 'https://via.placeholder.com/1920x1080/FF6B6B/FFFFFF?text=Campus+Background+1',
                'position' => 'center',
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/1920x1080/4ECDC4/FFFFFF?text=Campus+Background+2',
                'position' => 'center',
                'is_active' => 1
            ],
            [
                'image_url' => 'https://via.placeholder.com/1920x1080/45B7D1/FFFFFF?text=Campus+Background+3',
                'position' => 'center',
                'is_active' => 1
            ]
        ];

        foreach ($backgrounds as $background) {
            BackgroundImage::create($background);
        }
    }
}
