<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Display Informasi') - Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
            --sidebar-width: 250px;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -var(--sidebar-width);
            transition: margin .25s ease-out;
            background: #4e73df;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            width: var(--sidebar-width);
            color: white;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            color: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        #sidebar-wrapper .list-group {
            width: 100%;
        }

        #sidebar-wrapper .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        #sidebar-wrapper .list-group-item:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        #sidebar-wrapper .list-group-item.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 700;
        }

        #sidebar-wrapper .list-group-item i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }

        #sidebar-wrapper.toggled {
            margin-left: 0;
        }

        #page-content-wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .navbar-light {
            background-color: #fff !important;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
        }

        .container-fluid-content {
            padding: 1.5rem;
            flex: 1;
        }

        .card {
            border: none;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
            border-radius: 0.35rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -var(--sidebar-width);
            }
        }
    </style>
    @yield('css')
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-primary border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <i class="fas fa-tv me-2"></i> Admin Panel
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>

                <div class="sidebar-heading text-uppercase font-weight-bold" style="font-size: 0.75rem; padding: 1rem 1.5rem 0.5rem; opacity: 0.7;">
                    Management
                </div>

                <a href="{{ route('admin.jadwal.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('*.jadwal.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Jadwal
                </a>
                <a href="{{ route('admin.informasi.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('*.informasi.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> Informasi
                </a>
                <a href="{{ route('admin.carousel.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('*.carousel.*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i> Galeri / Carousel
                </a>
                <a href="{{ route('admin.video.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('*.video.*') ? 'active' : '' }}">
                    <i class="fas fa-video"></i> Video
                </a>
                <a href="{{ route('admin.background.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('*.background.*') ? 'active' : '' }}">
                    <i class="fas fa-image"></i> Background
                </a>

                <div class="mt-auto p-3">
                    <a href="{{ route('display') }}" target="_blank" class="btn btn-light btn-block w-100 text-primary">
                        <i class="fas fa-external-link-alt"></i> Lihat Layar
                    </a>
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-link text-primary" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle fa-lg"></i> Administrator
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('admin.settings.index') }}">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid-content">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <strong>Ada kesalahan input:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @yield('content')
            </div>

            <footer class="bg-white sticky-footer p-3 text-center text-muted border-top mt-auto">
                <small>&copy; {{ date('Y') }} Display Informasi - Solo Technopark. Developed with Laravel.</small>
            </footer>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @yield('js')
</body>

</html>