@extends('layouts.app')

@section('title', 'Tambah Video')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Video Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="video_file" class="form-label">Upload Video (Opsional if URL is filled)</label>
                        <input type="file" class="form-control @error('video_file') is-invalid @enderror"
                            id="video_file" name="video_file" accept="video/mp4,video/x-m4v,video/*">
                        <small class="form-text text-muted">Format: MP4, AVI, MOV, WMV, FLV, MKV. Max: 100 MB</small>
                        @error('video_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">atau URL Video (Opsional if file uploaded)</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror"
                            id="video_url" name="video_url" placeholder="https://youtube.com/watch?v=..." value="{{ old('video_url') }}">
                        <small class="form-text text-muted">Masukkan URL lengkap video (YouTube, Vimeo, dll)</small>
                        @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_file" class="form-label">Upload Thumbnail (Opsional)</label>
                        <input type="file" class="form-control @error('thumbnail_file') is-invalid @enderror"
                            id="thumbnail_file" name="thumbnail_file" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF, WebP. Max: 5 MB</small>
                        @error('thumbnail_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_url" class="form-label">atau URL Thumbnail (Opsional)</label>
                        <input type="text" class="form-control @error('thumbnail_url') is-invalid @enderror"
                            id="thumbnail_url" name="thumbnail_url" placeholder="https://example.com/thumb.jpg" value="{{ old('thumbnail_url') }}">
                        @error('thumbnail_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.video.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection