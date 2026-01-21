@extends('layouts.app')

@section('title', 'Edit Carousel')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Carousel</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="image_file" class="form-label">Upload Gambar Baru (Opsional)</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror"
                            id="image_file" name="image_file" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF, WebP. Max: 5 MB</small>
                        @if($carousel->image_url)
                        <div class="mt-2">
                            <small>Gambar saat ini:</small><br>
                            <img src="{{ $carousel->image_url }}" alt="Current Image" style="max-height: 100px; border-radius: 5px;">
                        </div>
                        @endif
                        @error('image_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">atau URL Gambar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror"
                            id="image_url" name="image_url" value="{{ old('image_url', $carousel->image_url) }}">
                        <small class="form-text text-muted">Akan diganti jika Anda mengupload gambar baru</small>
                        @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" class="form-control @error('caption') is-invalid @enderror"
                            id="caption" name="caption" value="{{ old('caption', $carousel->caption) }}">
                        @error('caption')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order_index" class="form-label">Urutan</label>
                        <input type="number" class="form-control @error('order_index') is-invalid @enderror"
                            id="order_index" name="order_index" value="{{ old('order_index', $carousel->order_index) }}">
                        @error('order_index')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $carousel->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection