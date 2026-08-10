@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Kembangkan Bakat & Minat</span>
            <h1 class="page-title">Ekstrakurikuler</h1>
            <p class="page-desc">Beragam kegiatan untuk mengasah potensi siswa di luar akademik.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="ekskul-grid">
                @forelse($ekstrakurikuler as $item)
                    <div class="ekskul-cell">
                        <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text='.urlencode($item->nama) }}" alt="{{ $item->nama }}">
                        <div class="cell-body">
                            @if($item->kategori)<span class="cell-tag">{{ $item->kategori }}</span>@endif
                            <h3>{{ $item->nama }}</h3>
                            <div class="cell-meta">
                                <div><i class="bi bi-person-badge"></i> {{ $item->pembina }}</div>
                                <div><i class="bi bi-calendar-week"></i> {{ $item->jadwal }}</div>
                            </div>
                            <a href="{{ route('extracurricular.show', $item->id) }}" class="btn-outline-ink w-100">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted p-4">Belum ada data ekstrakurikuler.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
