@extends('layouts.app')

@section('title', 'SPMB')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Penerimaan Peserta Didik Baru</span>
            <h1 class="page-title">{{ $spmb->judul }}</h1>
            <p class="page-subtitle">{{ $spmb->deskripsi }}</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-6" data-aos="zoom-in">
                    <div class="spmb-timeline-badge">
                        <i class="bi bi-calendar-check text-navy" style="font-size:1.6rem;"></i>
                        <p class="mb-1 mt-2 text-muted">Periode Pendaftaran</p>
                        <div class="date">
                            {{ $spmb->tanggal_mulai ? $spmb->tanggal_mulai->translatedFormat('d M Y') : '-' }}
                            &ndash;
                            {{ $spmb->tanggal_selesai ? $spmb->tanggal_selesai->translatedFormat('d M Y') : '-' }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="spmb-timeline-badge">
                        <i class="bi bi-cash-coin text-navy" style="font-size:1.6rem;"></i>
                        <p class="mb-1 mt-2 text-muted">Biaya Pendaftaran</p>
                        <div class="date" style="font-size:1.3rem;">{{ $spmb->biaya_pendaftaran ?? 'Gratis' }}</div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-list-check content-icon"></i>
                        <h4>Syarat Pendaftaran</h4>
                        <ul class="mission-list">
                            @foreach(explode("\n", $spmb->syarat_pendaftaran ?? '') as $poin)
                                @if(trim($poin) !== '')<li>{{ trim($poin) }}</li>@endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="glass-card content-card h-100">
                        <i class="bi bi-signpost-split content-icon"></i>
                        <h4>Alur Pendaftaran</h4>
                        @php $langkah = array_values(array_filter(explode("\n", $spmb->alur_pendaftaran ?? ''), fn($l) => trim($l) !== '')); @endphp
                        @foreach($langkah as $i => $poin)
                            <div class="spmb-step">
                                <div class="spmb-step-num">{{ $i + 1 }}</div>
                                <div class="pt-1">{{ trim($poin) }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                @if($spmb->brosur)
                    <a href="{{ asset('storage/'.$spmb->brosur) }}" target="_blank" class="btn btn-outline-navy-soft rounded-pill px-4 me-2 ripple"><i class="bi bi-file-earmark-arrow-down me-1"></i> Unduh Brosur</a>
                @endif
                <a href="{{ $spmb->link_pendaftaran ?? '#' }}" class="btn btn-navy-gradient rounded-pill px-4 ripple" target="_blank"><i class="bi bi-pencil-square me-1"></i> Daftar Sekarang</a>
            </div>
        </div>
    </section>

@endsection
