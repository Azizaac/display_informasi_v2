@extends('layouts.app')

@section('title', $informasi->judul)

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $informasi->judul }}</h5>
                <div>
                    <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="btn btn-warning btn-sm text-white">
                        Edit
                    </a>
                    <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted">
                        @if($informasi->kategori)
                        <span class="badge bg-info">{{ $informasi->kategori }}</span>
                        @endif
                        @if($informasi->penulis)
                        <span> • Penulis: <strong>{{ $informasi->penulis }}</strong></span>
                        @endif
                        <span> • Dipublikasikan: <strong>{{ $informasi->created_at->format('d M Y H:i') }}</strong></span>
                    </small>
                </div>

                <hr>

                <div class="content">
                    {!! nl2br(e($informasi->isi)) !!}
                </div>

                @if($informasi->image)
                <hr>
                <div class="mb-3">
                    <h6>Gambar:</h6>
                    @if(filter_var($informasi->image, FILTER_VALIDATE_URL))
                    <img src="{{ $informasi->image }}" alt="Gambar Informasi" class="img-fluid rounded">
                    @else
                    <img src="{{ asset('storage/' . $informasi->image) }}" alt="Gambar Informasi" class="img-fluid rounded">
                    @endif
                </div>
                @endif

                @if($informasi->video)
                <hr>
                <div class="mb-3">
                    <h6>Video:</h6>
                    @php
                    $isUrl = filter_var($informasi->video, FILTER_VALIDATE_URL);
                    @endphp
                    @if($isUrl)
                    @if(strpos($informasi->video, 'youtube.com') !== false || strpos($informasi->video, 'youtu.be') !== false)
                    @php
                    $videoUrl = $informasi->video;
                    if (strpos($videoUrl, 'watch?v=') !== false) {
                    $videoUrl = str_replace('watch?v=', 'embed/', $videoUrl);
                    }
                    @endphp
                    <iframe width="100%" height="400" src="{{ $videoUrl }}" frameborder="0" allowfullscreen class="rounded"></iframe>
                    @else
                    <video controls class="w-100 rounded">
                        <source src="{{ $informasi->video }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                    @endif
                    @else
                    <video controls class="w-100 rounded">
                        <source src="{{ asset('storage/' . $informasi->video) }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                    @endif
                </div>
                @endif

                <hr>

                <div class="mb-3">
                    <small class="text-muted">
                        Terakhir diperbarui: {{ $informasi->updated_at->format('d M Y H:i') }}
                    </small>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="btn btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('admin.informasi.destroy', $informasi->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </button>
                    </form>
                    <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection