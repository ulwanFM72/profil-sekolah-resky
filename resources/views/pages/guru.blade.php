@extends('layouts.app')

@section('title', 'Guru & Staff')

@section('content')

    <section class="page-header">
        <div class="container text-center" data-aos="fade-up">
            <span class="section-tag">Tim Pendidik</span>
            <h1 class="page-title">Guru & Tenaga Kependidikan</h1>
            <p class="page-subtitle">Tenaga pendidik dan kependidikan profesional yang berdedikasi untuk kemajuan siswa</p>
        </div>
    </section>

    <section class="section-generic">
        <div class="container">
            <div class="row g-4">
                @forelse($guru as $i => $item)
                    <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}">
                        <div class="guru-card">
                            <img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/220x220/1E3A8A/FFFFFF?text='.substr($item->nama,0,1) }}" alt="{{ $item->nama }}" class="guru-photo">
                            <h6>{{ $item->nama }}</h6>
                            <span class="guru-jabatan">{{ $item->jabatan }}</span>
                            @if($item->mata_pelajaran)
                                <p class="guru-mapel">{{ $item->mata_pelajaran }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data guru.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
