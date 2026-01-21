@extends('layouts.app')

@section('title', 'Edit Video')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Video</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="video_file" class="form-label">Upload Video Baru</label>
                        <input type="file" class="form-control @error('video_file') is-invalid @enderror"
                            id="video_file" name="video_file" accept="video/mp4,video/x-m4v,video/*">
                        <small class="form-text text-muted">Format: MP4, AVI, MOV, WMV, FLV, MKV. Max: 100 MB</small>
                        @if($video->video_url)
                        <div class="mt-2">
                            @if(filter_var($video->video_url, FILTER_VALIDATE_URL))
                            <small>Video saat ini: <a href="{{ $video->video_url }}" target="_blank">Lihat Video</a></small>
                            @else
                            <small>Video saat ini: <a href="{{ asset('storage/' . $video->video_url) }}" target="_blank">Lihat Video</a></small>
                            @endif
                        </div>
                        @endif
                        @error('video_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">URL Video</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror"
                            id="video_url" name="video_url" value="{{ old('video_url', $video->video_url) }}">
                        <small class="form-text text-muted">Akan diganti jika Anda mengupload video baru</small>
                        @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title', $video->title) }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="4">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_file" class="form-label">Upload Thumbnail Baru</label>
                        <input type="file" class="form-control @error('thumbnail_file') is-invalid @enderror"
                            id="thumbnail_file" name="thumbnail_file" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF, WebP. Max: 5 MB</small>
                        @if($video->thumbnail_url)
                        <div class="mt-2">
                            @if(filter_var($video->thumbnail_url, FILTER_VALIDATE_URL))
                            <img src="{{ $video->thumbnail_url }}" alt="Current Thumbnail" style="max-height: 100px; border-radius: 5px;">
                            @else
                            <img src="{{ asset('storage/' . $video->thumbnail_url) }}" alt="Current Thumbnail" style="max-height: 100px; border-radius: 5px;">
                            @endif
                        </div>
                        @endif
                        @error('thumbnail_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_url" class="form-label">URL Thumbnail</label>
                        <input type="text" class="form-control @error('thumbnail_url') is-invalid @enderror"
                            id="thumbnail_url" name="thumbnail_url" value="{{ old('thumbnail_url', $video->thumbnail_url) }}">
                        @error('thumbnail_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $video->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.video.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection