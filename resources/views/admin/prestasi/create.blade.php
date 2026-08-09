@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Prestasi</h6>
        <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Nama Prestasi</label>
                    <input type="text" name="nama_prestasi" class="form-control" value="{{ old('nama_prestasi') }}" required placeholder="Contoh: Juara 1 LKS RPL">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun', date('Y')) }}" required min="2000" max="2100">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Siswa (opsional)</label>
                    <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Akademik" @selected(old('kategori')==='Akademik')>Akademik</option>
                        <option value="Non Akademik" @selected(old('kategori')==='Non Akademik')>Non Akademik</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tingkat</label>
                    <select name="tingkat" class="form-select" required>
                        @foreach(['Sekolah','Kabupaten','Kota','Provinsi','Nasional','Internasional'] as $t)
                            <option value="{{ $t }}" @selected(old('tingkat') === $t)>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi (opsional)</label>
                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Foto (opsional)</label>
                    <input type="file" name="gambar" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
