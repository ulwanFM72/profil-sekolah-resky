@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">{{ $berita->tanggal->translatedFormat('d F Y') }}{{ $berita->kategori ? ' — '.$berita->kategori : '' }}</span>
            <h1 class="page-title">{{ $berita->judul }}</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <figure class="news-thumb-frame">
                        <img src="{{ $berita->thumbnail ? asset('storage/'.$berita->thumbnail) : 'https://placehold.co/900x500/16264D/FAF7F0?text=Berita' }}" alt="{{ $berita->judul }}">
                    </figure>
                    <div class="news-body-copy">{!! nl2br(e($berita->isi)) !!}</div>
                    <a href="{{ route('news.index') }}" class="btn-outline-ink mt-4"><i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita</a>
                </div>

                <div class="col-lg-4">
                    <h6 class="mb-2" style="text-transform:uppercase; font-size:0.78rem; letter-spacing:0.08em; color:var(--muted); font-family:'IBM Plex Sans';">Berita Lainnya</h6>
                    <div class="news-side-list">
                        @foreach($lainnya as $l)
                            <a href="{{ route('news.show', $l->slug) }}">
                                <span class="side-date">{{ $l->tanggal->translatedFormat('d M Y') }}</span>
                                <span class="side-title">{{ \Illuminate\Support\Str::limit($l->judul, 60) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
