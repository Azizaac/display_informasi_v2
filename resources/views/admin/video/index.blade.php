@extends('layouts.app')

@section('title', 'Kelola Video')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Video</h5>
                <a href="{{ route('admin.video.create') }}" class="btn btn-light btn-sm">+ Tambah Video</a>
            </div>
            <div class="card-body">
                @if($videos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Preview</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th width="10%">Status</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videos as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if($item->thumbnail_url)
                                    @php
                                    $thumbUrl = $item->thumbnail_url;
                                    if (!filter_var($thumbUrl, FILTER_VALIDATE_URL)) {
                                    $thumbUrl = asset('storage/' . ltrim(str_replace('/storage/', '', $thumbUrl), '/'));
                                    }
                                    @endphp
                                    <img src="{{ $thumbUrl }}" alt="Thumbnail" style="max-height: 50px; max-width: 80px; border-radius: 4px;">
                                    @elseif(strpos($item->video_url, 'youtube.com') !== false || strpos($item->video_url, 'youtu.be') !== false)
                                    @php
                                    $videoId = "";
                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item->video_url, $match)) {
                                    $videoId = $match[1];
                                    }
                                    @endphp
                                    @if($videoId)
                                    <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg" alt="YT Thumbnail" style="max-height: 50px; max-width: 80px; border-radius: 4px;">
                                    @else
                                    <div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 50px; width: 80px; border-radius: 4px;">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    @endif
                                    @else
                                    <div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 50px; width: 80px; border-radius: 4px;">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $item->title ?? $item->video_url }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>
                                    @if($item->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                    @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.video.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                    <form action="{{ route('admin.video.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-info text-center" role="alert">
                    <p class="mb-0">Belum ada video. <a href="{{ route('admin.video.create') }}">Tambah video sekarang</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection