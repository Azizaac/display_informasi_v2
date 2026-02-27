@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Jadwal Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jadwal.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu_mulai" class="form-label">Waktu Mulai (Tanggal & Jam) <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('waktu_mulai') is-invalid @enderror"
                                    id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required>
                                @error('waktu_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu_selesai" class="form-label">Waktu Selesai (Tanggal & Jam) <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('waktu_selesai') is-invalid @enderror"
                                    id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required>
                                @error('waktu_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="agenda" class="form-label">Nama Kegiatan / Agenda <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('agenda') is-invalid @enderror"
                            id="agenda" name="agenda" value="{{ old('agenda') }}" required>
                        @error('agenda')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="instansi" class="form-label">Instansi</label>
                                <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                    id="instansi" name="instansi" value="{{ old('instansi') }}">
                                @error('instansi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Tempat / Lokasi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                    id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                                @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pic" class="form-label">PIC (Person In Charge)</label>
                                <input type="text" class="form-control @error('pic') is-invalid @enderror"
                                    id="pic" name="pic" value="{{ old('pic') }}">
                                @error('pic')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                <input type="number" min="0" class="form-control @error('jumlah_peserta') is-invalid @enderror"
                                    id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}">
                                @error('jumlah_peserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="no_surat" class="form-label">No Surat</label>
                                <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                                    id="no_surat" name="no_surat" value="{{ old('no_surat') }}">
                                @error('no_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection