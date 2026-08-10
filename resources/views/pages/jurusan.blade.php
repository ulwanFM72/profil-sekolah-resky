@extends('layouts.app')

@section('title', 'Jurusan')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Kompetensi Keahlian</span>
            <h1 class="page-title">Jurusan / Program Keahlian</h1>
            <p class="page-desc">Empat kompetensi keahlian unggulan untuk mempersiapkan siswa siap kerja, siap kuliah, dan siap berwirausaha.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @forelse($jurusan as $i => $item)
                <div class="jurusan-row">
                    <span class="row-num">{{ sprintf('%02d', $i + 1) }}</span>
                    <img class="row-thumb" src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/280x200/16264D/FAF7F0?text='.$item->singkatan }}" alt="{{ $item->nama }}">
                    <div class="row-body">
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 150) }}</p>
                        <div class="row-meta"><span>{{ $item->siswa_count }} Siswa Aktif</span><span>{{ $item->galeri()->count() }} Dokumentasi</span></div>
                    </div>
                    <a href="{{ route('jurusan.show', $item->slug) }}" class="row-cta">Lihat Detail</a>
                </div>
            @empty
                <p class="text-muted">Belum ada data jurusan.</p>
            @endforelse
        </div>
    </section>

@endsection
