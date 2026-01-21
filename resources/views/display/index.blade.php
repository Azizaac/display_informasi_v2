<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Technopark - Display Informasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #ffffff;
            @if($background && !empty($background->image_url)) @php $finalBgUrl =filter_var($background->image_url, FILTER_VALIDATE_URL) ? $background->image_url : asset('storage/' . $background->image_url);
            @endphp background-image: url('{{ $finalBgUrl }}');
            background-size: cover;

            background-position: {
                    {
                    $background->position ?? 'center'
                }
            }

            ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            @else background: linear-gradient(135deg, #193F7A 0%, #0d1f3a 100%);
            @endif
        }

        .container {
            height: 100vh;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background-color: rgba(0, 0, 0, 0.14);
            backdrop-filter: blur(2px);
        }

        /* ============= HEADER SECTION ============= */
        .header {
            display: grid;
            grid-template-columns: 160px 1fr 160px;
            gap: 12px;
            align-items: center;
            flex-shrink: 0;
            animation: slideDown 0.4s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .date-box,
        .time-box {
            background: #D9A91A;
            color: #1a1a1a;
            padding: 12px 14px;
            border-radius: 14px;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 6px 18px rgba(217, 169, 26, 0.22);
            transition: all 0.3s ease;
        }

        .date-box:hover,
        .time-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(217, 169, 26, 0.28);
        }

        .date-box .day {
            font-size: 20px;
            margin-bottom: 4px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .date-box .date {
            font-size: 13px;
            font-weight: 600;
            opacity: 0.95;
        }

        .time-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .time-box .time {
            font-size: 34px;
            font-weight: 700;
            line-height: 1;
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }

        .title-section {
            background: #193F7A;
            padding: 10px 18px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(25, 63, 122, 0.22);
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .title-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(25, 63, 122, 0.28);
        }

        .title-section h1 {
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 6px;
            letter-spacing: 1.2px;
        }

        .title-section .address {
            font-size: 12px;
            opacity: 0.92;
            line-height: 1.4;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        /* ============= MAIN CONTENT ============= */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 480px;
            gap: 15px;
            flex: 1;
            min-height: 0;
        }

        /* ============= TABLE SECTION ============= */
        .table-section {
            background: transparent;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            backdrop-filter: none;
            box-shadow: none;
        }

        .table-wrapper {
            flex: 1;
            position: relative;
            overflow: hidden;
            padding: 0;
            margin-top: 0;
        }

        .schedule-header {
            display: grid;
            grid-template-columns: 140px 140px 1fr 140px;
            gap: 10px;
            padding: 10px 12px;
            background: rgba(25, 63, 122, 0.98);
            border-radius: 10px;
            font-weight: 800;
            font-size: 15px;
            position: sticky;
            top: 0;
            z-index: 100;
            color: #fff;
            box-shadow: 0 8px 20px rgba(25, 63, 122, 0.25);
            margin-bottom: 0;
            backdrop-filter: blur(10px);
            letter-spacing: 0.5px;
        }

        .schedule-header>div {
            padding: 10px 12px;
            text-align: center;
            border-right: none;
            background: transparent;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .schedule-track {
            display: flex;
            flex-direction: column;
            gap: 16px;
            transition: none;
            will-change: transform;
            padding: 0 8px 12px 8px;
            margin-top: 12px;
        }

        .schedule-row {
            display: grid;
            grid-template-columns: 140px 140px 1fr 140px;
            gap: 10px;
            padding: 12px 16px;
            background: rgba(0, 0, 0, 0.50);
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.04);
            flex-shrink: 0;
            color: #ffffff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
            transition: all 0.2s ease;
        }

        .schedule-row:hover {
            background: rgba(0, 0, 0, 0.55);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            transform: translateX(2px);
        }

        .schedule-row>div {
            padding: 6px 8px;
            font-size: 15px;
            font-weight: 600;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: none;
            letter-spacing: 0.3px;
        }

        /* ============= MEDIA SECTION ============= */
        .media-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .media-card {
            background: rgba(0, 0, 0, 0.30);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.40);
            /* backdrop-filter: blur(10px); // Removed as it can interfere with iframes */
            flex: 1;
            display: flex;
            flex-direction: column;
            border: 2px solid rgba(255, 255, 255, 0.10);
            transition: all 0.3s ease;
        }

        .media-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.45);
            border-color: rgba(255, 255, 255, 0.15);
        }

        .video-card {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.30);
            min-height: 220px;
        }

        .video-card iframe,
        .video-card video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-icon {
            font-size: 80px;
            opacity: 0.30;
        }

        .video-placeholder {
            text-align: center;
            opacity: 0.50;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .image-carousel {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.30);
            min-height: 220px;
        }

        .carousel-container {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.6s ease-in-out;
        }

        .carousel-slide {
            min-width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-slide .caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            transform: none;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 100%);
            padding: 15px 20px 45px 20px;
            color: white;
            font-size: 13px;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.5px;
            backdrop-filter: blur(2px);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.30);
            color: white;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.10);
        }

        .carousel-nav:hover {
            background: rgba(0, 0, 0, 0.80);
            transform: translateY(-50%) scale(1.1);
            border-color: rgba(255, 255, 255, 0.20);
        }

        .carousel-nav.prev {
            left: 10px;
        }

        .carousel-nav.next {
            right: 10px;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 5;
            backdrop-filter: blur(5px);
            padding: 6px 10px;
            border-radius: 20px;
            background: rgba(0, 0, 0, 0.30);
        }

        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.40);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-indicator:hover {
            background: rgba(255, 255, 255, 0.60);
        }

        .carousel-indicator.active {
            background: #D9A91A;
            width: 35px;
            border-radius: 6px;
            box-shadow: 0 0 12px rgba(217, 169, 26, 0.50);
        }

        /* ============= RESPONSIVE DESIGN ============= */
        @media (max-width: 1400px) {
            .main-content {
                grid-template-columns: 1fr 450px;
            }

            .schedule-header,
            .schedule-row {
                grid-template-columns: 150px 150px 1fr 150px;
            }
        }

        @media (max-width: 1200px) {
            .header {
                grid-template-columns: 1fr;
            }

            .main-content {
                grid-template-columns: 1fr;
            }

            .schedule-header,
            .schedule-row {
                grid-template-columns: 1fr 1fr 2fr 1fr;
                font-size: 14px;
            }

            .schedule-header>div,
            .schedule-row>div {
                padding: 15px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .title-section h1 {
                font-size: 18px;
            }

            .schedule-header {
                display: none;
            }

            .schedule-row {
                grid-template-columns: 1fr;
                gap: 8px;
                padding: 15px;
            }

            .schedule-row>div {
                padding: 8px 0;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                justify-content: center;
                text-align: center;
            }

            .schedule-row>div:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="date-box">
                <div class="day" id="dayName">Senin</div>
                <div class="date" id="currentDate">01/01/2026</div>
            </div>

            <div class="title-section">
                <h1><i class="fas fa-tv"></i> DISPLAY INFORMASI - SOLO TECHNOPARK</h1>
                <div class="address">
                    Jl. Slamet Riyadi No. 582, Surakarta, Jawa Tengah 57143
                </div>
            </div>

            <div class="time-box">
                <div class="time" id="currentTime">07:30</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Schedule Section -->
            <div class="table-section">
                <div class="table-wrapper">
                    <div class="schedule-header">
                        <div>Tanggal</div>
                        <div>Waktu</div>
                        <div>Agenda</div>
                        <div>Lokasi</div>
                    </div>
                    <div class="schedule-track" id="scheduleTrack">
                        @if($jadwals->count() > 0)
                        @foreach($jadwals as $jadwal)
                        <div class="schedule-row">
                            <div>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d/m/Y') }}</div>
                            <div>{{ substr($jadwal->waktu_mulai, 0, 5) }} - {{ substr($jadwal->waktu_selesai, 0, 5) }}</div>
                            <div>{{ $jadwal->agenda }}</div>
                            <div>{{ $jadwal->lokasi }}</div>
                        </div>
                        @endforeach
                        @else
                        <div class="schedule-row" style="grid-column: 1/-1;">
                            <div style="grid-column: 1/-1; text-align: center; opacity: 0.70;">
                                <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                                Belum ada jadwal kegiatan
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="media-section">
                <!-- Video Card -->
                <div class="media-card">
                    <div class="video-card">
                        @if($video)
                        @php
                        $videoUrl = $video->video_url;
                        $isYoutube = false;
                        $embedUrl = '';

                        // Check if it's a YouTube URL and extract the video ID
                        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches)) {
                        $isYoutube = true;
                        $embedUrl = 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1&mute=1&loop=1&playlist=' . $matches[1];
                        } else {
                        // For non-YouTube videos, check if it's a full URL or a storage path
                        $videoUrl = filter_var($videoUrl, FILTER_VALIDATE_URL) ? $videoUrl : asset('storage/' . $videoUrl);
                        }
                        @endphp

                        @if($isYoutube)
                        <iframe
                            src="{{ $embedUrl }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            style="width: 100%; height: 100%; border-radius: 12px;">
                        </iframe>
                        @else
                        <video width="100%" height="100%" controls autoplay>
                            <source src="{{ $videoUrl }}" type="video/mp4">
                            Browser Anda tidak mendukung video HTML5
                        </video>
                        @endif
                        @else
                        <div class="video-placeholder">
                            <i class="fas fa-video video-icon"></i>
                            <p style="margin-top: 15px;">Belum ada video untuk ditampilkan</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Carousel Card -->
                <div class="media-card">
                    @if(count($carousels) > 0)
                    <div class="image-carousel">
                        <div class="carousel-container" id="carouselContainer">
                            @foreach($carousels as $carousel)
                            @php
                            $imgUrl = filter_var($carousel->image_url, FILTER_VALIDATE_URL)
                            ? $carousel->image_url
                            : asset('storage/' . $carousel->image_url);
                            @endphp
                            <div class="carousel-slide" style="background-image: url('{{ $imgUrl }}');">
                                @if($carousel->caption)
                                <div class="caption">{{ $carousel->caption }}</div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        @if(count($carousels) > 1)
                        <button class="carousel-nav prev" onclick="changeSlide(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="carousel-nav next" onclick="changeSlide(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                        <div class="carousel-indicators" id="carouselIndicators"></div>
                        @endif
                    </div>
                    @else
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        <div style="text-align: center; opacity: 0.50;">
                            <i class="fas fa-images video-icon"></i>
                            <p style="margin-top: 15px;">Belum ada carousel images</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update time real-time
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('currentTime').textContent = `${hours}:${minutes}`;
        }
        updateTime();
        setInterval(updateTime, 1000);

        // Update date dan hari
        function updateDate() {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const now = new Date();
            const dayName = days[now.getDay()];
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();

            document.getElementById('dayName').textContent = dayName;
            document.getElementById('currentDate').textContent = `${day}/${month}/${year}`;
        }
        updateDate();
        setInterval(updateDate, 60000);

        // Auto-scroll schedule dengan infinite loop
        (function() {
            const track = document.getElementById('scheduleTrack');
            const tableWrapper = track ? track.closest('.table-wrapper') : null;
            if (!track || !tableWrapper) return;

            const rows = Array.from(track.children).filter(c => c.classList.contains('schedule-row'));
            if (rows.length === 0) return;

            const originalRowCount = rows.length;
            const cloneCount = Math.max(5, Math.ceil(10 / originalRowCount));

            for (let i = 0; i < cloneCount; i++) {
                rows.forEach(row => {
                    const clone = row.cloneNode(true);
                    track.appendChild(clone);
                });
            }

            let scrollPos = 0;
            const scrollSpeed = 30;
            let lastTime = performance.now();
            let isPaused = false;
            let singleSetHeight = 0;
            let initialized = false;

            function initScroll() {
                const firstRow = track.querySelector('.schedule-row');
                if (!firstRow) return false;

                const rowHeight = firstRow.offsetHeight || firstRow.clientHeight;
                if (rowHeight === 0) {
                    setTimeout(initScroll, 50);
                    return false;
                }

                const rowHeightWithGap = rowHeight + 16;
                singleSetHeight = rowHeightWithGap * originalRowCount;

                if (singleSetHeight <= 0) {
                    setTimeout(initScroll, 50);
                    return false;
                }

                scrollPos = 0;
                initialized = true;
                return true;
            }

            function animate(currentTime) {
                if (!isPaused && initialized) {
                    const deltaTime = (currentTime - lastTime) / 1000;
                    scrollPos += scrollSpeed * deltaTime;

                    if (scrollPos >= singleSetHeight) {
                        scrollPos -= singleSetHeight;
                    }

                    track.style.transform = `translateY(-${scrollPos}px)`;
                    lastTime = currentTime;
                }

                requestAnimationFrame(animate);
            }

            const tableSection = track.closest('.table-section');
            if (tableSection) {
                tableSection.addEventListener('mouseenter', () => isPaused = true);
                tableSection.addEventListener('mouseleave', () => {
                    isPaused = false;
                    lastTime = performance.now();
                });
            }

            function startAnimation() {
                if (!initialized) {
                    if (initScroll()) {
                        requestAnimationFrame(animate);
                    } else {
                        setTimeout(startAnimation, 50);
                    }
                } else {
                    requestAnimationFrame(animate);
                }
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', startAnimation);
            } else {
                setTimeout(startAnimation, 100);
            }
        })();

        // Carousel functionality
        @if(count($carousels) > 0)
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const totalSlides = slides.length;
        const carouselContainer = document.getElementById('carouselContainer');
        const indicatorsContainer = document.getElementById('carouselIndicators');

        if (indicatorsContainer && totalSlides > 0) {
            for (let i = 0; i < totalSlides; i++) {
                const indicator = document.createElement('div');
                indicator.className = 'carousel-indicator' + (i === 0 ? ' active' : '');
                indicator.onclick = () => goToSlide(i);
                indicatorsContainer.appendChild(indicator);
            }
        }

        function updateCarousel() {
            carouselContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
            document.querySelectorAll('.carousel-indicator').forEach((ind, idx) => {
                ind.classList.toggle('active', idx === currentSlide);
            });
        }

        window.changeSlide = function(direction) {
            currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
            updateCarousel();
        };

        window.goToSlide = function(index) {
            currentSlide = index;
            updateCarousel();
        };

        if (totalSlides > 1) {
            setInterval(() => changeSlide(1), 5000);
        }
        @endif
    </script>
</body>

</html>