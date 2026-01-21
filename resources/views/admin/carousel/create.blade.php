@extends('layouts.app')

@section('title', 'Tambah Carousel')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-images"></i> Tambah Carousel Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="image_file" class="form-label">Upload Gambar <span class="text-danger">*</span> (Opsional jika ada URL)</label>
                        <input type="file" class="form-control @error('image_file') is-invalid @enderror"
                            id="image_file" name="image_file" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF, WebP. Max: 5 MB</small>
                        <div id="imagePreview" style="margin-top: 10px;"></div>
                        @error('image_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">atau Masukkan URL Gambar <span class="text-danger">*</span> (Opsional jika upload)</label>
                        <input type="text" class="form-control @error('image_url') is-invalid @enderror"
                            id="image_url" name="image_url" placeholder="https://example.com/image.jpg" value="{{ old('image_url') }}">
                        <small class="form-text text-muted">Masukkan URL lengkap gambar</small>
                        @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" class="form-control @error('caption') is-invalid @enderror"
                            id="caption" name="caption" value="{{ old('caption') }}">
                        @error('caption')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order_index" class="form-label">Urutan</label>
                        <input type="number" class="form-control @error('order_index') is-invalid @enderror"
                            id="order_index" name="order_index" value="{{ old('order_index', 0) }}">
                        @error('order_index')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image_file').addEventListener('change', function(e) {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';

        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '200px';
                img.style.borderRadius = '8px';
                img.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
                preview.appendChild(img);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection