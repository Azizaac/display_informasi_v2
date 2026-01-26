@extends('layouts.app')

@section('title', 'Application Settings')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="app_name" class="form-label">Application Name</label>
                        <input type="text" class="form-control" id="app_name" name="app_name"
                            value="{{ $settings['app_name']->value ?? config('app.name') }}">
                        <small class="text-muted">Displayed in the title bar and login page.</small>
                    </div>

                    <div class="mb-3">
                        <label for="header_title" class="form-label">Display Header Title</label>
                        <input type="text" class="form-control" id="header_title" name="header_title"
                            value="{{ $settings['header_title']->value ?? 'DISPLAY INFORMASI - SOLO TECHNOPARK' }}">
                        <small class="text-muted">Main title displayed on the public screen.</small>
                    </div>

                    <div class="mb-3">
                        <label for="header_subtitle" class="form-label">Display Header Subtitle (Address)</label>
                        <textarea class="form-control" id="header_subtitle" name="header_subtitle" rows="2">{{ $settings['header_subtitle']->value ?? 'Jl. Slamet Riyadi No. 582, Surakarta, Jawa Tengah 57143' }}</textarea>
                        <small class="text-muted">Address or subtitle displayed below the main title.</small>
                    </div>

                    <div class="mb-3">
                        <label for="running_text" class="form-label">Running Text (Marquee)</label>
                        <textarea class="form-control" id="running_text" name="running_text" rows="3">{{ $settings['running_text']->value ?? 'Selamat Datang di Display Informasi' }}</textarea>
                        <small class="text-muted">Text displayed in the bottom running text bar.</small>
                    </div>

                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <input type="text" class="form-control" id="footer_text" name="footer_text"
                            value="{{ $settings['footer_text']->value ?? 'Display Informasi - Solo Technopark' }}">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection