<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$updated = App\Models\Video::where('is_active', 1)
    ->update(['video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);

echo "Updated {$updated} video(s) successfully!\n";

// Show current active video
$video = App\Models\Video::where('is_active', 1)->first();
if ($video) {
    echo "Current active video URL: {$video->video_url}\n";
}
