@extends('layouts.app')

@section('title', 'Pengaturan Aplikasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaturan Umum</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="app_name" class="form-label">Nama Aplikasi</label>
                        <input type="text" class="form-control" id="app_name" name="app_name"
                            value="{{ $settings['app_name']->value ?? config('app.name') }}">
                        <small class="text-muted">Ditampilkan di title bar dan halaman login.</small>
                    </div>

                    <div class="mb-3">
                        <label for="header_title" class="form-label">Judul Header Display</label>
                        <input type="text" class="form-control" id="header_title" name="header_title"
                            value="{{ $settings['header_title']->value ?? 'DISPLAY INFORMASI - SOLO TECHNOPARK' }}">
                        <small class="text-muted">Judul utama yang ditampilkan di layar publik.</small>
                    </div>

                    <div class="mb-3">
                        <label for="header_subtitle" class="form-label">Subjudul Header (Alamat)</label>
                        <textarea class="form-control" id="header_subtitle" name="header_subtitle" rows="2">{{ $settings['header_subtitle']->value ?? 'Jl. Slamet Riyadi No. 582, Surakarta, Jawa Tengah 57143' }}</textarea>
                        <small class="text-muted">Alamat atau subjudul yang ditampilkan di bawah judul utama.</small>
                    </div>

                    <div class="mb-3">
                        <label for="running_text" class="form-label">Teks Berjalan (Marquee)</label>
                        <textarea class="form-control" id="running_text" name="running_text" rows="3">{{ $settings['running_text']->value ?? 'Selamat Datang di Display Informasi' }}</textarea>
                        <small class="text-muted">Teks yang ditampilkan di bar teks berjalan bagian bawah.</small>
                    </div>

                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Teks Footer</label>
                        <input type="text" class="form-control" id="footer_text" name="footer_text"
                            value="{{ $settings['footer_text']->value ?? 'Display Informasi - Solo Technopark' }}">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection