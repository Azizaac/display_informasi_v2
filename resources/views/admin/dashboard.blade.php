@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="h4 mb-3 text-gray-800">Dashboard Overview</h2>
    </div>
</div>

<div class="row">
    <!-- Jadwal Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Jadwal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['jadwal'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.jadwal.index') }}" class="card-footer d-flex align-items-center justify-content-between small text-primary bg-white border-0">
                Kelola Jadwal <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Informasi Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Informasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['informasi'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.informasi.index') }}" class="card-footer d-flex align-items-center justify-content-between small text-success bg-white border-0">
                Kelola Informasi <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Carousel Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Carousel Images</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['carousel'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-images fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.carousel.index') }}" class="card-footer d-flex align-items-center justify-content-between small text-info bg-white border-0">
                Kelola Galleri <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Video Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Video</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['video'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-video fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.video.index') }}" class="card-footer d-flex align-items-center justify-content-between small text-warning bg-white border-0">
                Kelola Video <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary btn-block text-left">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Jadwal Baru
                    </a>
                    <a href="{{ route('admin.informasi.create') }}" class="btn btn-success btn-block text-left">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Informasi Baru
                    </a>
                    <a href="{{ route('display') }}" target="_blank" class="btn btn-dark btn-block text-left">
                        <i class="fas fa-tv me-2"></i> Lihat Display
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">System Info</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <p><strong>Waktu Server:</strong> {{ now()->format('d M Y H:i:s') }}</p>
                    <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                    <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection