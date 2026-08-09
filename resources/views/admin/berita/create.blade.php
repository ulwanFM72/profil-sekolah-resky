@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Tambah Berita Baru</h6>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">- Pilih -</option>
                        @foreach(['Akademik','Kegiatan','Pengumuman','Prestasi'] as $k)
                            <option value="{{ $k }}" @selected(old('kategori') === $k)>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                    <img id="previewImg" class="current-image-preview mt-2" style="display:none;">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi" class="form-control" style="min-height:220px;" required>{{ old('isi') }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-cancel rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>

@endsection
