@extends('layouts.app')

@section('title', 'Kelola Jadwal')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Jadwal</h5>
                <div class="d-flex gap-2">
                    {{-- Sync from Spreadsheet --}}
                    <form action="{{ route('admin.jadwal.sync') }}" method="POST" id="formSync" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirmSync()">
                            <i class="bi bi-cloud-download"></i> Sinkronisasi Spreadsheet
                        </button>
                    </form>
                    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-light btn-sm">+ Tambah Jadwal</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
                @endif

                @if($jadwals->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th width="4%">No</th>
                                <th>Tanggal & Waktu Mulai</th>
                                <th>Selesai</th>
                                <th>Agenda</th>
                                <th>Instansi</th>
                                <th>Lokasi</th>
                                <th>PIC</th>
                                <th>Peserta</th>
                                <th>No Surat</th>
                                <th width="14%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->waktu_mulai->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($item->waktu_selesai->format('H:i') === '23:59')
                                    <span class="text-muted">Selesai</span>
                                    @else
                                    {{ $item->waktu_selesai->format('H:i') }}
                                    @endif
                                </td>
                                <td>{{ $item->agenda }}</td>
                                <td>{{ $item->instansi ?? '-' }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->pic ?? '-' }}</td>
                                <td>{{ $item->jumlah_peserta ?? '-' }}</td>
                                <td>{{ $item->no_surat ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning text-white">Ubah</a>
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
                    <p class="mb-0">Belum ada jadwal. <a href="{{ route('admin.jadwal.create') }}">Tambah jadwal sekarang</a> atau klik <strong>Sinkronisasi Spreadsheet</strong> untuk import otomatis.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function confirmSync() {
        return confirm('⚠️ Sinkronisasi akan MENGHAPUS semua jadwal yang ada dan menggantinya dengan data dari spreadsheet (status: Completed).\n\nLanjutkan?');
    }

    // Show loading spinner on sync submit
    document.getElementById('formSync').addEventListener('submit', function() {
        const btn = this.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memuat data...';
    });
</script>
@endpush
@endsection