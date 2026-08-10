@extends('layouts.app')

@section('title', $item->nama)

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">{{ $item->singkatan }}</span>
            <h1 class="page-title">{{ $item->nama }}</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <figure class="jurusan-detail-figure mb-4">
                        <img src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/900x500/16264D/FAF7F0?text='.$item->singkatan }}" alt="{{ $item->nama }}">
                        <figcaption>Dokumentasi kegiatan Jurusan {{ $item->singkatan }}</figcaption>
                    </figure>
                    <div class="info-panel">
                        <span class="panel-eyebrow">Tentang Jurusan</span>
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        @if($item->kepala_jurusan)
                            <p class="mt-3 fw-semibold" style="color:var(--navy-deep);">Kepala Jurusan: {{ $item->kepala_jurusan }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="fact-box mb-3">
                        <span class="num">{{ $item->siswa_count }}</span>
                        <span class="lbl">Siswa Aktif di Jurusan {{ $item->singkatan }}</span>
                    </div>
                    <div class="fact-box">
                        <span class="num">{{ $item->galeri->count() }}</span>
                        <span class="lbl">Foto Dokumentasi</span>
                    </div>
                    <a href="{{ route('jurusan.index') }}" class="btn-outline-ink w-100 mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Daftar Jurusan</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">Dokumentasi</span><h2 class="section-title">Galeri Jurusan {{ $item->singkatan }}</h2></div>
            </div>
            <div class="gal-grid">
                @forelse($item->galeri as $foto)
                    <figure class="gal-figure">
                        <a href="{{ $foto->gambar ? asset('storage/'.$foto->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text='.urlencode($foto->judul) }}" class="lightbox-trigger" data-caption="{{ $foto->judul }}">
                            <img src="{{ $foto->gambar ? asset('storage/'.$foto->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text='.urlencode($foto->judul) }}" alt="{{ $foto->judul }}" loading="lazy">
                        </a>
                        <figcaption><span class="g-title">{{ $foto->judul }}</span></figcaption>
                    </figure>
                @empty
                    <p class="text-muted">Belum ada dokumentasi untuk jurusan ini.</p>
                @endforelse
            </div>
        </div>
    </section>

    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" id="lightboxClose"><i class="bi bi-x-lg"></i></span>
        <img src="" alt="" id="lightboxImage">
        <p id="lightboxCaption"></p>
    </div>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">Lainnya</span><h2 class="section-title">Jurusan Lain</h2></div>
            </div>
            <div class="row g-3">
                @foreach($lainnya as $lain)
                    <div class="col-md-4">
                        <a href="{{ route('jurusan.show', $lain->slug) }}" class="jurusan-row" style="grid-template-columns: 50px 1fr auto; padding:18px 20px; border:2px solid var(--line-strong);">
                            <span class="row-num" style="font-size:1rem;">{{ $lain->singkatan }}</span>
                            <span class="row-body"><h3 style="font-size:0.98rem;">{{ $lain->nama }}</h3></span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
