@extends('layouts.app')

@section('title', 'Berita')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Informasi Terkini</span>
            <h1 class="page-title">Berita & Pengumuman</h1>
            <p class="page-desc">Ikuti kabar dan agenda terbaru dari sekolah kami.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @forelse($berita as $item)
                <a href="{{ route('news.show', $item->slug) }}" class="news-index-item">
                    <span class="n-date">{{ $item->tanggal->translatedFormat('d M Y') }}</span>
                    <div class="n-body">
                        @if($item->kategori)<span class="n-tag">{{ $item->kategori }}</span>@endif
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->ringkasan }}</p>
                    </div>
                    <span class="n-arrow"><i class="bi bi-arrow-right"></i></span>
                </a>
            @empty
                <p class="text-muted">Belum ada berita.</p>
            @endforelse

            <div class="mt-4">{{ $berita->links() }}</div>
        </div>
    </section>

@endsection
