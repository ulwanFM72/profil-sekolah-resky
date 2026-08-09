@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Edit Ekstrakurikuler</h6>
        <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $ekstrakurikuler->nama) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">- Pilih -</option>
                        @foreach(['Olahraga','Seni','Akademik','Kepemimpinan','Sosial'] as $k)
                            <option value="{{ $k }}" @selected(old('kategori', $ekstrakurikuler->kategori) === $k)>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Pembina</label>
                    <input type="text" name="pembina" class="form-control" value="{{ old('pembina', $ekstrakurikuler->pembina) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jadwal</label>
                    <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal', $ekstrakurikuler->jadwal) }}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Gambar</label><br>
                    @if($ekstrakurikuler->gambar)
                        <img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}" class="current-image-preview" id="previewImg">
                    @else
                        <img class="current-image-preview" id="previewImg" style="display:none;">
                    @endif
                    <input type="file" name="gambar" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-cancel rounded-pill px-4">Kembali</a>
            </div>
        </form>
    </div>

@endsection
