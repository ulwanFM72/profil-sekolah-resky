@extends('layouts.admin')

@section('title', 'Edit Guru')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Edit Data Guru / Staff</h6>
        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $guru->nama) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $guru->jabatan) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIP (opsional)</label>
                    <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mata Pelajaran (opsional)</label>
                    <input type="text" name="mata_pelajaran" class="form-control" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Foto</label><br>
                    @if($guru->foto)
                        <img src="{{ asset('storage/'.$guru->foto) }}" class="current-image-preview" id="previewImg">
                    @else
                        <img class="current-image-preview" id="previewImg" style="display:none;">
                    @endif
                    <input type="file" name="foto" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-cancel rounded-pill px-4">Kembali</a>
            </div>
        </form>
    </div>

@endsection
