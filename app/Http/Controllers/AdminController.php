<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Carousel;
use App\Models\Video;
use App\Models\Informasi;
use App\Models\BackgroundImage;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'jadwal' => Jadwal::count(),
            'carousel' => Carousel::count(),
            'video' => Video::count(),
            'informasi' => Informasi::count(),
            'background' => BackgroundImage::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
