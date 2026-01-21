@extends('layouts.app')

@section('title', 'Kelola Jadwal')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Jadwal</h5>
                <a href="{{ route('admin.jadwal.create') }}" class="btn btn-light btn-sm">+ Tambah Jadwal</a>
            </div>
            <div class="card-body">
                @if($jadwals->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Agenda</th>
                                <th>Lokasi</th>
                                <th>PIC</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                                <td>{{ $item->agenda }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->pic ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                    <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                    <p class="mb-0">Belum ada jadwal. <a href="{{ route('admin.jadwal.create') }}">Tambah jadwal sekarang</a></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection