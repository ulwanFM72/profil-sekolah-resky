@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Edit Testimoni</h6>
        <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $testimonial->nama) }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jurusan / Kelas</label>
                    <input type="text" name="jurusan_kelas" class="form-control" value="{{ old('jurusan_kelas', $testimonial->jurusan_kelas) }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Isi Testimoni</label>
                    <textarea name="isi_testimoni" class="form-control" required>{{ old('isi_testimoni', $testimonial->isi_testimoni) }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Foto (opsional)</label><br>
                    @if($testimonial->foto)
                        <img src="{{ asset('storage/'.$testimonial->foto) }}" class="current-image-preview" id="previewImg">
                    @else
                        <img class="current-image-preview" id="previewImg" style="display:none;">
                    @endif
                    <input type="file" name="foto" class="form-control image-input-preview" data-preview="previewImg" accept="image/*">
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-cancel rounded-pill px-4">Kembali</a>
            </div>
        </form>
    </div>

@endsection
