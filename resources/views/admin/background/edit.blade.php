@extends('layouts.app')

@section('title', 'Edit Background')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Background</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.background.update', $background->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="image_file" class="form-label">Upload Gambar Baru</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror"
                            id="image_file" name="image_file" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF, WebP. Max: 5 MB</small>
                        @if($background->image_url)
                        <div class="mt-2">
                            @if(filter_var($background->image_url, FILTER_VALIDATE_URL))
                            <img src="{{ $background->image_url }}" alt="Current Background" style="max-height: 100px; border-radius: 5px;">
                            @else
                            <img src="{{ asset('storage/' . $background->image_url) }}" alt="Current Background" style="max-height: 100px; border-radius: 5px;">
                            @endif
                        </div>
                        @endif
                        @error('image_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">URL Gambar</label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror"
                            id="image_url" name="image_url" value="{{ old('image_url', $background->image_url) }}">
                        @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <select class="form-control @error('position') is-invalid @enderror" id="position" name="position">
                            <option value="center" {{ old('position', $background->position) == 'center' ? 'selected' : '' }}>Center</option>
                            <option value="top" {{ old('position', $background->position) == 'top' ? 'selected' : '' }}>Top</option>
                            <option value="bottom" {{ old('position', $background->position) == 'bottom' ? 'selected' : '' }}>Bottom</option>
                            <option value="left" {{ old('position', $background->position) == 'left' ? 'selected' : '' }}>Left</option>
                            <option value="right" {{ old('position', $background->position) == 'right' ? 'selected' : '' }}>Right</option>
                        </select>
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $background->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.background.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection