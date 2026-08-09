@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Tentang Kami</span>
            <h1 class="page-title">Profil Sekolah</h1>
            <p class="page-subtitle">Mengenal lebih dekat sejarah, visi misi, dan identitas sekolah kami</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-clock-history content-icon"></i>
                        <h4>Sejarah Sekolah</h4>
                        <p>{{ $setting->sejarah ?? 'Sejarah sekolah belum ditambahkan oleh admin.' }}</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-flag-fill content-icon"></i>
                        <h4>Sambutan Kepala Sekolah</h4>
                        <p>"{{ $setting->sambutan_kepala ?? '' }}" — {{ $setting->nama_kepala_sekolah ?? 'Kepala Sekolah' }}</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-eye-fill content-icon"></i>
                        <h4>Visi</h4>
                        <p>{{ $setting->visi ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-bullseye content-icon"></i>
                        <h4>Misi</h4>
                        <ul class="mission-list">
                            @foreach(explode("\n", $setting->misi ?? '') as $poin)
                                @if(trim($poin) !== '')
                                    <li>{{ trim($poin) }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-generic bg-soft">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Data Resmi</span>
                <h2 class="section-title">Informasi Sekolah</h2>
            </div>

            <div class="row g-4 mt-2">
                @php
                    $infoItems = [
                        ['icon' => 'bi-mortarboard', 'label' => 'Nama Sekolah', 'value' => $setting->nama_sekolah],
                        ['icon' => 'bi-upc-scan', 'label' => 'NPSN', 'value' => $setting->npsn],
                        ['icon' => 'bi-patch-check', 'label' => 'Status', 'value' => $setting->status],
                        ['icon' => 'bi-award', 'label' => 'Akreditasi', 'value' => $setting->akreditasi],
                        ['icon' => 'bi-calendar-event', 'label' => 'Tahun Berdiri', 'value' => $setting->tahun_berdiri],
                        ['icon' => 'bi-geo-alt', 'label' => 'Alamat', 'value' => $setting->alamat],
                        ['icon' => 'bi-envelope', 'label' => 'Email', 'value' => $setting->email],
                        ['icon' => 'bi-globe', 'label' => 'Website', 'value' => $setting->website],
                        ['icon' => 'bi-telephone', 'label' => 'Telepon', 'value' => $setting->telepon],
                    ];
                @endphp

                @foreach($infoItems as $i => $info)
                    @if(!empty($info['value']))
                        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $i * 50 }}">
                            <div class="info-card">
                                <div class="info-icon"><i class="bi {{ $info['icon'] }}"></i></div>
                                <div><span class="info-label">{{ $info['label'] }}</span><p class="info-value">{{ $info['value'] }}</p></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Tim Kami</span>
                <h2 class="section-title">Struktur Organisasi</h2>
            </div>
            <div class="row g-4 mt-2">
                @foreach($strukturOrganisasi as $i => $guru)
                    <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                        <div class="team-card">
                            <img src="{{ $guru->foto ? asset('storage/'.$guru->foto) : 'https://placehold.co/200x200/1E3A8A/FFFFFF?text='.substr($guru->nama,0,1) }}" alt="{{ $guru->nama }}">
                            <h6>{{ $guru->nama }}</h6>
                            <span>{{ $guru->jabatan }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($setting->maps_lat && $setting->maps_lng)
    <section class="section-generic bg-soft">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-tag">Kunjungi Kami</span>
                <h2 class="section-title">Denah Lokasi Sekolah</h2>
            </div>
            <div class="map-wrapper" data-aos="zoom-in">
                <iframe src="https://maps.google.com/maps?q={{ $setting->maps_lat }},{{ $setting->maps_lng }}&z=17&output=embed"
                    width="100%" height="420" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>
    @endif

@endsection
