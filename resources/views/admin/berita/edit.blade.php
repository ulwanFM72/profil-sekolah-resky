@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Edit Berita</h6>
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">- Pilih -</option>
                        @foreach(['Akademik','Kegiatan','Pengumuman','Prestasi'] as $k)
                            <option value="{{ $k }}" @selected(old('kategori', $berita->kategori) === $k)>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Thumbnail</label><br>
                    @if($berita->thumbnail)
                        <img src="{{ asset('storage/'.$berita->thumbnail) }}" class="current-image-preview" id="previewImg">
                    @else
                        <img class="current-image-preview" id="previewImg" style="display:none;">
                    @endif
                    <input type="file" name="thumbnail" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi" class="form-control" style="min-height:220px;" required>{{ old('isi', $berita->isi) }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-cancel rounded-pill px-4">Kembali</a>
            </div>
        </form>
    </div>

@endsection
