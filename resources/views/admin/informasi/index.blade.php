@extends('layouts.app')

@section('title', 'Daftar Informasi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Informasi</h5>
                <a href="{{ route('admin.informasi.create') }}" class="btn btn-light btn-sm">+ Tambah Informasi</a>
            </div>
            <div class="card-body">
                @if($informasi->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Judul</th>
                                <th width="10%">Kategori</th>
                                <th width="10%">Penulis</th>
                                <th width="10%">Media</th>
                                <th width="15%">Tanggal</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($informasi as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    @if($item->kategori)
                                    <span class="badge bg-info">{{ $item->kategori }}</span>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->penulis ?? '-' }}</td>
                                <td>
                                    @if($item->image)
                                    <i class="fas fa-image text-success"
                                        title="Ada Gambar"
                                        style="cursor: help;"
                                        onclick="alert('Path: {{ $item->image }}')"></i>
                                    @endif
                                    @if($item->video)
                                    <i class="fas fa-video text-primary"
                                        title="Ada Video"
                                        style="cursor: help;"
                                        onclick="alert('Path: {{ $item->video }}')"></i>
                                    @endif
                                    @if(!$item->image && !$item->video)
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.informasi.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-info text-center" role="alert">
                    <p class="mb-0">Belum ada informasi. <a href="{{ route('admin.informasi.create') }}">Tambah informasi sekarang</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection