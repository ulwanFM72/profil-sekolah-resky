<div class="utility-bar">
    <div class="container">
        <div>
            @if(!empty($setting->email))<span><i class="bi bi-envelope"></i>{{ $setting->email }}</span>@endif
            @if(!empty($setting->telepon))<span><i class="bi bi-telephone"></i>{{ $setting->telepon }}</span>@endif
        </div>
        <div>
            <span><i class="bi bi-geo-alt"></i>{{ $setting->alamat ?? '' }}</span>
        </div>
    </div>
</div>

<header class="masthead">
    <div class="container masthead-inner">
        <a href="{{ route('home') }}" class="brand-mark">
            <span class="mark-box">
                @if(!empty($setting->logo))
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo">
                @else
                    {{ strtoupper(substr($setting->nama_sekolah ?? 'S', 0, 2)) }}
                @endif
            </span>
            <span class="brand-text">
                <strong>{{ $setting->nama_sekolah ?? 'Nama Sekolah' }}</strong>
                <span>{{ $setting->status ?? '' }} · Akreditasi {{ $setting->akreditasi ?? '' }}</span>
            </span>
        </a>

        <nav class="masthead-nav" id="masthead-nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a>
            <a href="{{ route('jurusan.index') }}" class="{{ request()->routeIs('jurusan.*') ? 'active' : '' }}">Jurusan</a>
            <a href="{{ route('guru') }}" class="{{ request()->routeIs('guru') ? 'active' : '' }}">Guru</a>
            <a href="{{ route('extracurricular.index') }}" class="{{ request()->routeIs('extracurricular.*') ? 'active' : '' }}">Ekstrakurikuler</a>
            <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a>
            <a href="{{ route('achievement') }}" class="{{ request()->routeIs('achievement') ? 'active' : '' }}">Prestasi</a>
            <a href="{{ route('spmb') }}" class="btn-spmb-tag">SPMB {{ date('Y') }}</a>
        </nav>

        <button class="nav-toggle" id="navToggle" aria-label="Menu"><i class="bi bi-list"></i></button>
    </div>
</header>
