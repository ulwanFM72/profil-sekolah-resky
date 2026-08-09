<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-logo">
                @if(!empty($setting->logo))
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo">
                @else
                    <i class="bi bi-mortarboard-fill"></i>
                @endif
            </span>
            <span class="brand-text">{{ $setting->nama_sekolah ?? 'Nama Sekolah' }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('guru') ? 'active' : '' }}" href="{{ route('guru') }}">Guru</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('extracurricular.*') ? 'active' : '' }}" href="{{ route('extracurricular.index') }}">Ekstrakurikuler</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('achievement') ? 'active' : '' }}" href="{{ route('achievement') }}">Prestasi</a></li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-navy-gradient rounded-pill px-4" href="{{ route('spmb') }}">SPMB</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
