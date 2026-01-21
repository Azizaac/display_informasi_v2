<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateVideoUrl extends Command
{
    protected $signature = 'video:update-url';
    protected $description = 'Update video URL to an embeddable YouTube video';

    public function handle()
    {
        $updated = DB::table('videos')
            ->where('is_active', 1)
            ->update(['video_url' => 'https://youtu.be/jNQXAC9IVRw']);

        $this->info("Updated {$updated} video(s) successfully!");

        // Show current videos
        $videos = DB::table('videos')->get();
        $this->info("\nCurrent videos in database:");
        foreach ($videos as $video) {
            $this->line("ID: {$video->id} | Active: {$video->is_active} | URL: {$video->video_url}");
        }

        return 0;
    }
}
