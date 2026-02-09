<?php
$urls = [
    "https://www.youtube.com/watch?v=FjI-p0G4k2A",
    "https://youtu.be/FjI-p0G4k2A",
    "https://www.youtube.com/embed/FjI-p0G4k2A",
    "https://www.youtube.com/watch?v=FjI-p0G4k2A&t=10s",
    "https://youtu.be/FjI-p0G4k2A?feature=shared"
];

foreach ($urls as $url) {
    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        echo "Match: " . $matches[1] . " | URL: " . $url . "\n";
    } else {
        echo "No Match | URL: " . $url . "\n";
    }
}
