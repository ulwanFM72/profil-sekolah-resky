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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
</head>
<body>

    <div id="loading-screen">
        <div class="loader-content">
            <div class="loader-ring"></div>
            <p>Memuat halaman...</p>
        </div>
    </div>

    @include('partials.navbar')

    @if(session('success'))
        <div class="alert-toast" id="flashToast">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="backToTop" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></button>

    @php $wa = $setting->whatsapp ?? null; @endphp
    @if($wa)
        <a href="https://wa.me/{{ $wa }}?text={{ urlencode('Assalamualaikum, saya ingin bertanya tentang informasi sekolah.') }}"
           target="_blank" class="whatsapp-float" aria-label="Chat WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
