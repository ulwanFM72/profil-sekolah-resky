@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Jurusan Baru</h6>
        <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Nama Jurusan</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Contoh: Rekayasa Perangkat Lunak">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}" required placeholder="Contoh: RPL">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Kepala Jurusan</label>
                    <input type="text" name="kepala_jurusan" class="form-control" value="{{ old('kepala_jurusan') }}" placeholder="Nama kepala jurusan">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required placeholder="Jelaskan kompetensi keahlian jurusan ini...">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Gambar Sampul</label>
                    <input type="file" name="gambar_sampul" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
