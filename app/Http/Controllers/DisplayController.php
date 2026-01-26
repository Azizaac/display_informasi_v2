<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Carousel;
use App\Models\Video;
use App\Models\BackgroundImage;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    /**
     * Tampilkan halaman display utama
     */
    public function index()
    {
        // Fetch active jadwal sorted by date and time
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        // Fetch active carousel sorted by order_index
        $carousels = Carousel::where('is_active', true)
            ->orderBy('order_index', 'asc')
            ->get();

        // Fetch first active video
        $video = Video::where('is_active', true)
            ->first();

        // Fetch first active background
        $background = BackgroundImage::where('is_active', true)
            ->first();

        // Fetch settings
        $settings = \App\Models\Setting::all()->keyBy('key');

        return view('display.index', compact('jadwals', 'carousels', 'video', 'background', 'settings'));
    }

    /**
     * API endpoint untuk mendapatkan jadwal dalam JSON (untuk AJAX)
     */
    public function getJadwalApi()
    {
        $jadwals = Jadwal::orderBy('tanggal', 'asc')
            ->orderBy('waktu_mulai', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $jadwals
        ]);
    }

    /**
     * API endpoint untuk mendapatkan carousel dalam JSON
     */
    public function getCarouselApi()
    {
        $carousels = Carousel::where('is_active', true)
            ->orderBy('order_index', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $carousels
        ]);
    }

    /**
     * API endpoint untuk mendapatkan video dalam JSON
     */
    public function getVideoApi()
    {
        $video = Video::where('is_active', true)->first();

        return response()->json([
            'success' => true,
            'data' => $video
        ]);
    }

    /**
     * API endpoint untuk mendapatkan background dalam JSON
     */
    public function getBackgroundApi()
    {
        $background = BackgroundImage::where('is_active', true)->first();

        return response()->json([
            'success' => true,
            'data' => $background
        ]);
    }
}
