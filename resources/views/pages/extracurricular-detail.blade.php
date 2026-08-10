@extends('layouts.app')

@section('title', $item->nama)

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">{{ $item->kategori ?? 'Ekstrakurikuler' }}</span>
            <h1 class="page-title">{{ $item->nama }}</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <figure class="jurusan-detail-figure mb-4">
                        <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/900x500/16264D/FAF7F0?text='.urlencode($item->nama) }}" alt="{{ $item->nama }}">
                    </figure>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><div class="data-row" style="border-top:2px solid var(--line-strong);"><span class="k">Pembina</span><span class="v">{{ $item->pembina }}</span></div></div>
                        <div class="col-md-6"><div class="data-row" style="border-top:2px solid var(--line-strong);"><span class="k">Jadwal</span><span class="v">{{ $item->jadwal }}</span></div></div>
                    </div>
                    <div class="info-panel">
                        <span class="panel-eyebrow">Deskripsi</span>
                        <h3>Tentang Kegiatan</h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                    <a href="{{ route('extracurricular.index') }}" class="btn-outline-ink mt-4"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </section>

@endsection
