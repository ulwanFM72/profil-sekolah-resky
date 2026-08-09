@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

    <div class="admin-form-card">
        <h6 class="mb-4">Pengaturan Profil & Identitas Sekolah</h6>
        <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <h6 class="text-muted small text-uppercase mt-2 mb-3">Identitas Sekolah</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $setting->nama_sekolah) }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">NPSN</label>
                    <input type="text" name="npsn" class="form-control" value="{{ old('npsn', $setting->npsn) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Negeri" @selected(old('status', $setting->status)==='Negeri')>Negeri</option>
                        <option value="Swasta" @selected(old('status', $setting->status)==='Swasta')>Swasta</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control" value="{{ old('akreditasi', $setting->akreditasi) }}" maxlength="5">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="text" name="tahun_berdiri" class="form-control" value="{{ old('tahun_berdiri', $setting->tahun_berdiri) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Kepala Sekolah</label>
                    <input type="text" name="nama_kepala_sekolah" class="form-control" value="{{ old('nama_kepala_sekolah', $setting->nama_kepala_sekolah) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jam Operasional</label>
                    <input type="text" name="jam_operasional" class="form-control" value="{{ old('jam_operasional', $setting->jam_operasional) }}" placeholder="Senin - Jumat: 07:00 - 15:30 WIB">
                </div>
            </div>

            <h6 class="text-muted small text-uppercase mt-4 mb-3">Kontak & Lokasi</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $setting->alamat) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $setting->email) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ old('website', $setting->website) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $setting->telepon) }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">WhatsApp (format 62xxx)</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $setting->whatsapp) }}" placeholder="6281234567890">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Latitude Peta</label>
                    <input type="text" name="maps_lat" class="form-control" value="{{ old('maps_lat', $setting->maps_lat) }}" placeholder="-7.2602795">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Longitude Peta</label>
                    <input type="text" name="maps_lng" class="form-control" value="{{ old('maps_lng', $setting->maps_lng) }}" placeholder="107.0309619">
                </div>
            </div>
            <p class="text-muted small mt-1"><i class="bi bi-info-circle"></i> Cara mendapatkan koordinat: buka Google Maps → cari lokasi sekolah → klik kanan titiknya → koordinat akan muncul di menu.</p>

            <h6 class="text-muted small text-uppercase mt-4 mb-3">Konten Halaman Profil</h6>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Sejarah Sekolah</label>
                    <textarea name="sejarah" class="form-control">{{ old('sejarah', $setting->sejarah) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Visi</label>
                    <textarea name="visi" class="form-control">{{ old('visi', $setting->visi) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Misi <span class="text-muted fw-normal">(satu poin per baris)</span></label>
                    <textarea name="misi" class="form-control">{{ old('misi', $setting->misi) }}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Sambutan Kepala Sekolah</label>
                    <textarea name="sambutan_kepala" class="form-control">{{ old('sambutan_kepala', $setting->sambutan_kepala) }}</textarea>
                </div>
            </div>

            <h6 class="text-muted small text-uppercase mt-4 mb-3">Logo & Gambar</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Logo Sekolah</label><br>
                    @if($setting->logo)
                        <img src="{{ asset('storage/'.$setting->logo) }}" class="current-image-preview" id="previewLogo">
                    @else
                        <img class="current-image-preview" id="previewLogo" style="display:none;">
                    @endif
                    <input type="file" name="logo" class="form-control image-input-preview" data-preview="previewLogo" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gambar Hero / Beranda</label><br>
                    @if($setting->hero_image)
                        <img src="{{ asset('storage/'.$setting->hero_image) }}" class="current-image-preview" id="previewHero">
                    @else
                        <img class="current-image-preview" id="previewHero" style="display:none;">
                    @endif
                    <input type="file" name="hero_image" class="form-control image-input-preview" data-preview="previewHero" accept="image/*">
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-navy-admin rounded-pill px-4"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>

@endsection
