@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-copy">
                    <span class="hero-tag">Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }} — {{ $setting->status ?? 'Sekolah' }} Terakreditasi {{ $setting->akreditasi ?? '' }}</span>
                    <h1 class="hero-title">{{ $setting->nama_sekolah ?? 'Nama Sekolah' }}</h1>
                    <p class="hero-desc">{{ $setting->visi ?? 'Mewujudkan generasi unggul, berkarakter, dan siap menghadapi dunia kerja maupun pendidikan lanjutan.' }}</p>
                    <div class="hero-actions">
                        <a href="{{ route('spmb') }}" class="btn-ink">Daftar SPMB <i class="bi bi-arrow-right"></i></a>
                        <a href="{{ route('profile') }}" class="btn-outline-ink">Profil Sekolah</a>
                    </div>
                </div>
                <div class="hero-panel">
                    <div class="hero-fact"><span class="num">{{ $statistik['jumlah_siswa'] }}</span><span class="lbl">Siswa Aktif</span></div>
                    <div class="hero-fact"><span class="num">{{ $statistik['jumlah_guru'] }}</span><span class="lbl">Guru & Tenaga Pendidik</span></div>
                    <div class="hero-fact"><span class="num">{{ $jurusan->count() }}</span><span class="lbl">Kompetensi Keahlian</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- STATISTIK STRIP --}}
    <section class="stat-strip-wrap">
        <div class="container">
            <div class="stat-strip">
                <div class="stat-cell"><span class="num" data-count="{{ $statistik['jumlah_guru'] }}">0</span><span class="lbl">Guru & Staff</span></div>
                <div class="stat-cell"><span class="num" data-count="{{ $statistik['jumlah_siswa'] }}">0</span><span class="lbl">Siswa Aktif</span></div>
                <div class="stat-cell"><span class="num" data-count="{{ $statistik['jumlah_prestasi'] }}">0</span><span class="lbl">Prestasi Diraih</span></div>
                <div class="stat-cell"><span class="num" data-count="{{ $statistik['jumlah_ekstrakurikuler'] }}">0</span><span class="lbl">Ekstrakurikuler</span></div>
            </div>
        </div>
    </section>

    {{-- JURUSAN --}}
    <section class="section">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">01 — Program Keahlian</span><h2 class="section-title">Kompetensi Keahlian</h2></div>
                <a href="{{ route('jurusan.index') }}" class="section-link">Semua Jurusan</a>
            </div>

            @foreach($jurusan as $i => $item)
                <div class="jurusan-row">
                    <span class="row-num">{{ sprintf('%02d', $i + 1) }}</span>
                    <img class="row-thumb" src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/280x200/16264D/FAF7F0?text='.$item->singkatan }}" alt="{{ $item->nama }}">
                    <div class="row-body">
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 130) }}</p>
                        <div class="row-meta"><span>{{ $item->siswa_count }} Siswa</span><span>{{ $item->singkatan }}</span></div>
                    </div>
                    <a href="{{ route('jurusan.show', $item->slug) }}" class="row-cta">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- BERITA --}}
    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">02 — Kabar Sekolah</span><h2 class="section-title">Berita Terbaru</h2></div>
                <a href="{{ route('news.index') }}" class="section-link">Semua Berita</a>
            </div>

            @forelse($beritaTerbaru as $berita)
                <a href="{{ route('news.show', $berita->slug) }}" class="news-index-item">
                    <span class="n-date">{{ $berita->tanggal->translatedFormat('d M Y') }}</span>
                    <div class="n-body">
                        @if($berita->kategori)<span class="n-tag">{{ $berita->kategori }}</span>@endif
                        <h3>{{ $berita->judul }}</h3>
                        <p>{{ $berita->ringkasan }}</p>
                    </div>
                    <span class="n-arrow"><i class="bi bi-arrow-right"></i></span>
                </a>
            @empty
                <p class="text-muted">Belum ada berita.</p>
            @endforelse
        </div>
    </section>

    {{-- PRESTASI --}}
    <section class="section">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">03 — Kebanggaan Kami</span><h2 class="section-title">Prestasi Sekolah</h2></div>
                <a href="{{ route('achievement') }}" class="section-link">Semua Prestasi</a>
            </div>

            @forelse($prestasiTerbaru->take(5) as $p)
                <div class="ach-row">
                    <span class="ach-year">{{ $p->tahun }}</span>
                    <div>
                        <div class="ach-title">{{ $p->nama_prestasi }}</div>
                        <div class="ach-desc">{{ $p->deskripsi }}</div>
                    </div>
                    <span class="ach-level">{{ $p->tingkat }}</span>
                </div>
            @empty
                <p class="text-muted">Belum ada data prestasi.</p>
            @endforelse
        </div>
    </section>

    {{-- GALERI --}}
    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">04 — Dokumentasi</span><h2 class="section-title">Galeri Kegiatan</h2></div>
                <a href="{{ route('gallery') }}" class="section-link">Semua Galeri</a>
            </div>

            <div class="gal-grid">
                @foreach($galeriTerbaru as $item)
                    <figure class="gal-figure lightbox-trigger-wrap">
                        <a href="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text=Galeri' }}" class="lightbox-trigger" data-caption="{{ $item->judul }} — {{ $item->kategori }}">
                            <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/500x375/16264D/FAF7F0?text=Galeri' }}" alt="{{ $item->judul }}" loading="lazy">
                        </a>
                        <figcaption><span class="g-title">{{ $item->judul }}</span><span class="g-cat">{{ $item->kategori }}</span></figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="section">
        <div class="container">
            <div class="section-head">
                <div><span class="section-eyebrow">05 — Kata Mereka</span><h2 class="section-title">Testimoni Siswa & Alumni</h2></div>
            </div>

            <div class="quote-deck">
                @foreach($testimonials as $i => $t)
                    <div class="quote-slide {{ $i === 0 ? 'active' : '' }}">
                        <span class="quote-mark">&ldquo;</span>
                        <p class="quote-text">{{ $t->isi_testimoni }}</p>
                        <div class="quote-author">
                            <img src="{{ $t->foto ? asset('storage/'.$t->foto) : 'https://placehold.co/60x60/16264D/FAF7F0?text='.substr($t->nama,0,1) }}" alt="{{ $t->nama }}">
                            <div><strong>{{ $t->nama }}</strong><span>{{ $t->jurusan_kelas }}</span></div>
                        </div>
                    </div>
                @endforeach

                @if($testimonials->count() > 1)
                    <div class="quote-dots">
                        @foreach($testimonials as $i => $t)
                            <button class="{{ $i === 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- CTA SPMB --}}
    <section class="section section-alt">
        <div class="container">
            <div class="spmb-cta">
                <div>
                    <span class="hero-tag" style="color:#F1DDCB; border-color:#F1DDCB;">Penerimaan Peserta Didik Baru</span>
                    <h2>{{ $spmb->judul }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit($spmb->deskripsi, 150) }}</p>
                </div>
                <a href="{{ route('spmb') }}" class="btn-accent">Info SPMB <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>

@endsection
