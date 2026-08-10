@extends('layouts.app')

@section('title', 'SPMB')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Penerimaan Peserta Didik Baru</span>
            <h1 class="page-title">{{ $spmb->judul }}</h1>
            <p class="page-desc">{{ $spmb->deskripsi }}</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-3 mb-5">
                <div class="col-md-6">
                    <div class="spmb-info-box">
                        <span class="lbl">Periode Pendaftaran</span>
                        <div class="val">
                            {{ $spmb->tanggal_mulai ? $spmb->tanggal_mulai->translatedFormat('d M Y') : '-' }}
                            &ndash;
                            {{ $spmb->tanggal_selesai ? $spmb->tanggal_selesai->translatedFormat('d M Y') : '-' }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="spmb-info-box">
                        <span class="lbl">Biaya Pendaftaran</span>
                        <div class="val">{{ $spmb->biaya_pendaftaran ?? 'Gratis' }}</div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Syarat</span>
                        <h3>Syarat Pendaftaran</h3>
                        <ul class="list-plain">
                            @foreach(explode("\n", $spmb->syarat_pendaftaran ?? '') as $poin)
                                @if(trim($poin) !== '')<li>{{ trim($poin) }}</li>@endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-panel h-100">
                        <span class="panel-eyebrow">Alur</span>
                        <h3>Alur Pendaftaran</h3>
                        @php $langkah = array_values(array_filter(explode("\n", $spmb->alur_pendaftaran ?? ''), fn($l) => trim($l) !== '')); @endphp
                        @foreach($langkah as $i => $poin)
                            <div class="spmb-step"><span class="step-n">{{ sprintf('%02d', $i + 1) }}</span><div class="pt-1">{{ trim($poin) }}</div></div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                @if($spmb->brosur)
                    <a href="{{ asset('storage/'.$spmb->brosur) }}" target="_blank" class="btn-outline-ink me-2"><i class="bi bi-file-earmark-arrow-down"></i> Unduh Brosur</a>
                @endif
                <a href="{{ $spmb->link_pendaftaran ?? '#' }}" class="btn-ink" target="_blank">Daftar Sekarang <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>

@endsection
