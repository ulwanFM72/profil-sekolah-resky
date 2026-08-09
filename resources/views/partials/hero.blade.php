<section class="hero-section" id="hero">
    <div class="hero-blob blob-1"></div>
    <div class="hero-blob blob-2"></div>

    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="900">
                <span class="hero-badge">🎓 {{ $setting->status ?? 'Sekolah' }} Terakreditasi {{ $setting->akreditasi ?? '' }}</span>
                <h1 class="hero-title">{{ $setting->nama_sekolah ?? 'Nama Sekolah' }}</h1>
                <p class="hero-desc">{{ $setting->visi ?? 'Mewujudkan generasi unggul, berkarakter, dan siap menghadapi masa depan.' }}</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('spmb') }}" class="btn btn-navy-gradient btn-lg rounded-pill px-4 ripple">
                        <i class="bi bi-pencil-square me-2"></i>Daftar SPMB
                    </a>
                    <a href="{{ route('profile') }}" class="btn btn-outline-glass btn-lg rounded-pill px-4 ripple">
                        <i class="bi bi-building me-2"></i>Lihat Profil
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-duration="900">
                <div class="hero-illustration floating">
                    <div class="glass-card hero-illustration-card">
                        <i class="bi bi-mortarboard-fill hero-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator"><i class="bi bi-chevron-double-down"></i></div>
</section>
