@extends('layouts.app')

@section('title', 'Edit Informasi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Edit Informasi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" name="judul" value="{{ old('judul', $informasi->judul) }}" required>
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('isi') is-invalid @enderror"
                            id="isi" name="isi" rows="6" required>{{ old('isi', $informasi->isi) }}</textarea>
                        @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategori" name="kategori" value="{{ old('kategori', $informasi->kategori) }}">
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                    id="penulis" name="penulis" value="{{ old('penulis', $informasi->penulis) }}">
                                @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image_file" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('image_file') is-invalid @enderror"
                                    id="image_file" name="image_file" accept="image/*">
                                @if($informasi->image)
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Gambar saat ini:
                                    @if(filter_var($informasi->image, FILTER_VALIDATE_URL))
                                    <a href="{{ $informasi->image }}" target="_blank">Lihat</a>
                                    @else
                                    <a href="{{ asset('storage/' . $informasi->image) }}" target="_blank">Lihat</a>
                                    @endif
                                </small>
                                @endif
                                @error('image_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="video_file" class="form-label">Video</label>
                                <input type="file" class="form-control @error('video_file') is-invalid @enderror"
                                    id="video_file" name="video_file" accept="video/*">
                                @if($informasi->video)
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah video. Video saat ini:
                                    @if(filter_var($informasi->video, FILTER_VALIDATE_URL))
                                    <a href="{{ $informasi->video }}" target="_blank">Lihat</a>
                                    @else
                                    <a href="{{ asset('storage/' . $informasi->video) }}" target="_blank">Lihat</a>
                                    @endif
                                </small>
                                @endif
                                @error('video_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.informasi.show', $informasi->id) }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection