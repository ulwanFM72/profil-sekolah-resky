@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Tentang Kami</span>
            <h1 class="page-title">Profil Sekolah</h1>
            <p class="page-desc">Sejarah, visi misi, dan identitas resmi {{ $setting->nama_sekolah ?? 'sekolah kami' }}.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Sejarah</span>
                        <h3>Perjalanan Kami</h3>
                        <p>{{ $setting->sejarah ?? 'Sejarah sekolah belum ditambahkan oleh admin.' }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Sambutan</span>
                        <h3>Kepala Sekolah</h3>
                        <p>&ldquo;{{ $setting->sambutan_kepala ?? '' }}&rdquo;</p>
                        <p class="mt-3 fw-semibold" style="color:var(--navy-deep);">— {{ $setting->nama_kepala_sekolah ?? 'Kepala Sekolah' }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Visi</span>
                        <h3>Arah Kami</h3>
                        <p>{{ $setting->visi ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Misi</span>
                        <h3>Langkah Kami</h3>
                        <ul class="list-plain">
                            @foreach(explode("\n", $setting->misi ?? '') as $poin)
                                @if(trim($poin) !== '')<li>{{ trim($poin) }}</li>@endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">Data Resmi</span><h2 class="section-title">Informasi Sekolah</h2></div>
            </div>
            <div class="row">
                <div class="col-12">
                    @php
                        $rows = [
                            ['Nama Sekolah', $setting->nama_sekolah], ['NPSN', $setting->npsn],
                            ['Status', $setting->status], ['Akreditasi', $setting->akreditasi],
                            ['Tahun Berdiri', $setting->tahun_berdiri], ['Alamat', $setting->alamat],
                            ['Email', $setting->email], ['Website', $setting->website], ['Telepon', $setting->telepon],
                        ];
                    @endphp
                    @foreach($rows as $r)
                        @if(!empty($r[1]))
                            <div class="data-row"><span class="k">{{ $r[0] }}</span><span class="v">{{ $r[1] }}</span></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">Tim Kami</span><h2 class="section-title">Struktur Organisasi</h2></div>
                <a href="{{ route('guru') }}" class="section-link">Semua Guru</a>
            </div>
            <div class="team-grid">
                @foreach($strukturOrganisasi as $guru)
                    <div class="team-cell">
                        <img src="{{ $guru->foto ? asset('storage/'.$guru->foto) : 'https://placehold.co/160x160/16264D/FAF7F0?text='.substr($guru->nama,0,1) }}" alt="{{ $guru->nama }}">
                        <h6>{{ $guru->nama }}</h6>
                        <span class="role">{{ $guru->jabatan }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if($setting->maps_lat && $setting->maps_lng)
    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">Kunjungi Kami</span><h2 class="section-title">Denah Lokasi</h2></div>
            </div>
            <div class="map-frame">
                <iframe src="https://maps.google.com/maps?q={{ $setting->maps_lat }},{{ $setting->maps_lng }}&z=17&output=embed" width="100%" height="420" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>
    @endif

@endsection
