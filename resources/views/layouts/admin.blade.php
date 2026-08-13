<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body>

<div class="admin-wrapper">

    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <i class="bi bi-mortarboard-fill"></i>
            <span>Admin Panel</span>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>

            <span class="sidebar-label">Konten Utama</span>
            <a href="{{ route('admin.jurusan.index') }}" class="{{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}"><i class="bi bi-diagram-3-fill"></i> Jurusan</a>
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"><i class="bi bi-newspaper"></i> Berita</a>
            <a href="{{ route('admin.guru.index') }}" class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}"><i class="bi bi-person-workspace"></i> Guru & Staff</a>
            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="{{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}"><i class="bi bi-stars"></i> Ekstrakurikuler</a>
            <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"><i class="bi bi-images"></i> Galeri</a>
            <a href="{{ route('admin.prestasi.index') }}" class="{{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}"><i class="bi bi-trophy-fill"></i> Prestasi</a>
            <a href="{{ route('admin.testimonial.index') }}" class="{{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }}"><i class="bi bi-chat-quote-fill"></i> Testimoni</a>

            <span class="sidebar-label">Pengaturan</span>
            <a href="{{ route('admin.setting.edit') }}" class="{{ request()->routeIs('admin.setting.*') ? 'active' : '' }}"><i class="bi bi-building-gear"></i> Profil Sekolah</a>
            <a href="{{ route('admin.spmb.edit') }}" class="{{ request()->routeIs('admin.spmb.*') ? 'active' : '' }}"><i class="bi bi-pencil-square"></i> Info SPMB</a>

        </nav>
    </aside>

    <div class="admin-main">
        <header class="admin-topbar">
            <button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
            <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
            <div class="topbar-user">
                <span class="d-none d-sm-inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill ms-2"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
            </div>
        </header>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>
