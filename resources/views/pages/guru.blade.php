@extends('layouts.app')

@section('title', 'Guru & Staff')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Tim Pendidik</span>
            <h1 class="page-title">Guru & Tenaga Kependidikan</h1>
            <p class="page-desc">Tenaga pendidik dan kependidikan profesional yang berdedikasi untuk kemajuan siswa.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="team-grid">
                @forelse($guru as $item)
                    <div class="team-cell">
                        <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/160x160/16264D/FAF7F0?text='.substr($item->nama,0,1) }}" alt="{{ $item->nama }}">
                        <h6>{{ $item->nama }}</h6>
                        <span class="role">{{ $item->jabatan }}</span>
                        @if($item->mata_pelajaran)<span class="subject">{{ $item->mata_pelajaran }}</span>@endif
                    </div>
                @empty
                    <p class="text-muted p-4">Belum ada data guru.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
