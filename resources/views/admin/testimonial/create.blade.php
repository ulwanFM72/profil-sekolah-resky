@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Testimoni</h6>
        <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jurusan / Kelas</label>
                    <input type="text" name="jurusan_kelas" class="form-control" value="{{ old('jurusan_kelas') }}" placeholder="Contoh: XII RPL 1 / Alumni 2023">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Isi Testimoni</label>
                    <textarea name="isi_testimoni" class="form-control" required>{{ old('isi_testimoni') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
