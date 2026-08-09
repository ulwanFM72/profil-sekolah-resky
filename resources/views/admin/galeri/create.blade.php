@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Foto Galeri</h6>
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Foto</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">- Pilih Kategori -</option>
                        @foreach(['Pembelajaran','Upacara','Perlombaan','Ekstrakurikuler','Wisuda','Kegiatan Sosial'] as $k)
                            <option value="{{ $k }}" @selected(old('kategori') === $k)>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Foto</label>
                    <input type="file" name="gambar" class="form-control image-input-preview" data-preview="previewImg" accept="image/*" required>
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
