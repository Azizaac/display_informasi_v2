<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Update to "Me at the zoo" - first YouTube video, always embeddable
$updated = App\Models\Video::where('is_active', 1)
    ->update(['video_url' => 'https://www.youtube.com/watch?v=jNQXAC9IVRw']);

echo "✅ Updated {$updated} video(s)\n";
$video = App\Models\Video::where('is_active', 1)->first();
echo "Current URL: {$video->video_url}\n";
