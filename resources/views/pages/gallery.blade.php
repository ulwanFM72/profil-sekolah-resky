@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Dokumentasi Sekolah</span>
            <h1 class="page-title">Galeri Kegiatan</h1>
            <p class="page-desc">Kumpulan momen kegiatan pembelajaran, perlombaan, dan kegiatan sekolah lainnya.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="gal-filter">
                @foreach($kategori as $i => $kat)
                    <button class="{{ $i === 0 ? 'active' : '' }}" data-filter="{{ $kat }}">{{ $kat }}</button>
                @endforeach
            </div>

            <div class="gal-grid">
                @forelse($galeri as $item)
                    <figure class="gal-figure" data-category="{{ $item->kategori }}">
                        <a href="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text='.urlencode($item->judul) }}" class="lightbox-trigger" data-caption="{{ $item->judul }} — {{ $item->kategori }}">
                            <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text='.urlencode($item->judul) }}" alt="{{ $item->judul }}" loading="lazy">
                        </a>
                        <figcaption><span class="g-title">{{ $item->judul }}</span><span class="g-cat">{{ $item->kategori }}</span></figcaption>
                    </figure>
                @empty
                    <p class="text-muted">Belum ada foto pada galeri.</p>
                @endforelse
            </div>
        </div>
    </section>

    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" id="lightboxClose"><i class="bi bi-x-lg"></i></span>
        <img src="" alt="" id="lightboxImage">
        <p id="lightboxCaption"></p>
    </div>

@endsection
