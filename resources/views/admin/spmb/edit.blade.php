@extends('layouts.admin')

@section('title', 'Informasi SPMB')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Pengaturan Informasi SPMB / PPDB</h6>
        <form action="{{ route('admin.spmb.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $spmb->judul) }}" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $spmb->deskripsi) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Mulai Pendaftaran</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', optional($spmb->tanggal_mulai)->format('Y-m-d')) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Selesai Pendaftaran</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', optional($spmb->tanggal_selesai)->format('Y-m-d')) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Biaya Pendaftaran</label>
                    <input type="text" name="biaya_pendaftaran" class="form-control" value="{{ old('biaya_pendaftaran', $spmb->biaya_pendaftaran) }}" placeholder="Gratis / Rp 150.000">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Link Pendaftaran Online</label>
                    <input type="text" name="link_pendaftaran" class="form-control" value="{{ old('link_pendaftaran', $spmb->link_pendaftaran) }}" placeholder="https://...">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Syarat Pendaftaran <span class="text-muted fw-normal">(satu poin per baris)</span></label>
                    <textarea name="syarat_pendaftaran" class="form-control" style="min-height:160px;">{{ old('syarat_pendaftaran', $spmb->syarat_pendaftaran) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Alur Pendaftaran <span class="text-muted fw-normal">(satu langkah per baris)</span></label>
                    <textarea name="alur_pendaftaran" class="form-control" style="min-height:160px;">{{ old('alur_pendaftaran', $spmb->alur_pendaftaran) }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Brosur (PDF / Gambar)</label><br>
                    @if($spmb->brosur)
                        <a href="{{ asset('storage/'.$spmb->brosur) }}" target="_blank" class="d-inline-block mb-2"><i class="bi bi-file-earmark-arrow-down"></i> Lihat brosur saat ini</a><br>
                    @endif
                    <input type="file" name="brosur" class="form-control" accept=".pdf,image/*">
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>

@endsection
