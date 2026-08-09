@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')

    <div class="admin-form-card mb-4">
        <h6 class="mb-4">Edit Jurusan — {{ $jurusan->nama }}</h6>
        <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Nama Jurusan</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $jurusan->nama) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Singkatan</label>
                    <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan', $jurusan->singkatan) }}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Kepala Jurusan</label>
                    <input type="text" name="kepala_jurusan" class="form-control" value="{{ old('kepala_jurusan', $jurusan->kepala_jurusan) }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Gambar Sampul</label><br>
                    @if($jurusan->gambar_sampul)
                        <img src="{{ asset('storage/'.$jurusan->gambar_sampul) }}" class="current-image-preview" id="previewImg">
                    @else
                        <img class="current-image-preview" id="previewImg" style="display:none;">
                    @endif
                    <input type="file" name="gambar_sampul" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-cancel rounded-pill px-4">Kembali</a>
            </div>
        </form>
    </div>

    <div class="admin-form-card">
        <h6 class="mb-3">Galeri Jurusan {{ $jurusan->singkatan }}</h6>

        <form action="{{ route('admin.jurusan.galeri.store', $jurusan->id) }}" method="POST" enctype="multipart/form-data" class="row g-2 align-items-end mb-4">
            @csrf
            <div class="col-md-5">
                <label class="form-label">Judul Foto</label>
                <input type="text" name="judul" class="form-control" required placeholder="Contoh: Praktik di Lab RPL">
            </div>
            <div class="col-md-5">
                <label class="form-label">Foto</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-navy-admin w-100"><i class="bi bi-plus-lg"></i> Tambah</button>
            </div>
        </form>

        <div class="mini-gallery-grid">
            @forelse($jurusan->galeri as $foto)
                <div class="mini-gallery-item">
                    <img src="{{ $foto->gambar ? asset('storage/'.$foto->gambar) : 'https://placehold.co/200x150/1E3A8A/FFFFFF?text=Foto' }}" alt="{{ $foto->judul }}" title="{{ $foto->judul }}">
                    <form action="{{ route('admin.jurusan.galeri.destroy', [$jurusan->id, $foto->id]) }}" method="POST" class="btn-delete-confirm" data-confirm="Hapus foto ini?">
                        @csrf @method('DELETE')
                        <button type="submit"><i class="bi bi-x-lg"></i></button>
                    </form>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada foto galeri untuk jurusan ini.</p>
            @endforelse
        </div>
    </div>

@endsection
