@extends('layouts.app')

@section('title', 'Prestasi Sekolah')

@section('content')

    <section class="page-masthead">
        <div class="container">
            <span class="section-eyebrow">Kebanggaan Kami</span>
            <h1 class="page-title">Prestasi Sekolah</h1>
            <p class="page-desc">Rangkaian pencapaian akademik dan non akademik siswa-siswi kami.</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="ach-tab-bar mb-4">
                <button class="active" data-target="akademik">Akademik</button>
                <button data-target="nonakademik">Non Akademik</button>
            </div>

            <div data-ach-panel="akademik" style="display:block;">
                @forelse($akademik as $item)
                    <div class="ach-row">
                        <span class="ach-year">{{ $item->tahun }}</span>
                        <div>
                            <div class="ach-title">{{ $item->nama_prestasi }}</div>
                            @if($item->nama_siswa)<div class="ach-desc mb-1">{{ $item->nama_siswa }}</div>@endif
                            <div class="ach-desc">{{ $item->deskripsi }}</div>
                        </div>
                        <span class="ach-level">{{ $item->tingkat }}</span>
                    </div>
                @empty
                    <p class="text-muted">Belum ada data prestasi akademik.</p>
                @endforelse
            </div>

            <div data-ach-panel="nonakademik" style="display:none;">
                @forelse($nonAkademik as $item)
                    <div class="ach-row">
                        <span class="ach-year">{{ $item->tahun }}</span>
                        <div>
                            <div class="ach-title">{{ $item->nama_prestasi }}</div>
                            @if($item->nama_siswa)<div class="ach-desc mb-1">{{ $item->nama_siswa }}</div>@endif
                            <div class="ach-desc">{{ $item->deskripsi }}</div>
                        </div>
                        <span class="ach-level">{{ $item->tingkat }}</span>
                    </div>
                @empty
                    <p class="text-muted">Belum ada data prestasi non akademik.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
