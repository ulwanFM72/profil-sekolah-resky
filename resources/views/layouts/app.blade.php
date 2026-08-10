<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $setting->nama_sekolah ?? 'Website Sekolah') | {{ $setting->nama_sekolah ?? '' }}</title>
    <meta name="description" content="{{ $setting->visi ?? 'Website resmi sekolah' }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

    <div id="loading-bar"></div>

    @if(session('success'))
        <div class="toast-note" id="flashToast"><i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}</div>
    @endif

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="backToTop" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></button>

    @php $wa = $setting->whatsapp ?? null; @endphp
    @if($wa)
        <a href="https://wa.me/{{ $wa }}?text={{ urlencode('Assalamualaikum, saya ingin bertanya tentang informasi sekolah.') }}" target="_blank" class="whatsapp-tab">
            <i class="bi bi-whatsapp"></i> Tanya Admin
        </a>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
