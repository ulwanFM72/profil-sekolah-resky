@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Ekstrakurikuler</h6>
        <form action="{{ route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">- Pilih -</option>
                        @foreach(['Olahraga','Seni','Akademik','Kepemimpinan','Sosial'] as $k)
                            <option value="{{ $k }}" @selected(old('kategori') === $k)>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" value="{{ old('pembina') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jadwal</label>
                    <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal') }}" required placeholder="Contoh: Sabtu, 08:00 - 11:00">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
