@extends('layouts.app')

@section('title', 'Kelola Background')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Background</h5>
                <a href="{{ route('admin.background.create') }}" class="btn btn-light btn-sm">+ Tambah Background</a>
            </div>
            <div class="card-body">
                @if($backgrounds->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="30%">Preview</th>
                                <th>Position</th>
                                <th width="10%">Status</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backgrounds as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @php
                                    $url = $item->image_url;
                                    if (!filter_var($url, FILTER_VALIDATE_URL)) {
                                    $url = asset('storage/' . ltrim(str_replace('/storage/', '', $url), '/'));
                                    }
                                    @endphp
                                    <img src="{{ $url }}" alt="Background" style="max-height: 60px; max-width: 100px; border-radius: 4px;">
                                </td>
                                <td>{{ $item->position }}</td>
                                <td>
                                    @if($item->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                    @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.background.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                    <form action="{{ route('admin.background.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                    <p class="mb-0">Belum ada background. <a href="{{ route('admin.background.create') }}">Tambah background sekarang</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection