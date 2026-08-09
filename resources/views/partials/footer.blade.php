<footer class="site-footer">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="brand-logo">
                        @if(!empty($setting->logo))
                            <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo">
                        @else
                            <i class="bi bi-mortarboard-fill"></i>
                        @endif
                    </span>
                    <span class="footer-brand">{{ $setting->nama_sekolah ?? '' }}</span>
                </div>
                <p class="footer-text">{{ $setting->visi ?? '' }}</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    @if(!empty($setting->whatsapp))
                        <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-title">Navigasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                    <li><a href="{{ route('guru') }}">Guru & Staff</a></li>
                    <li><a href="{{ route('extracurricular.index') }}">Ekstrakurikuler</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="footer-title">Informasi</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('news.index') }}">Berita</a></li>
                    <li><a href="{{ route('achievement') }}">Prestasi</a></li>
                    <li><a href="{{ route('spmb') }}">SPMB</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h6 class="footer-title">Kontak Kami</h6>
                <ul class="footer-contact">
                    @if(!empty($setting->alamat))
                        <li><i class="bi bi-geo-alt-fill"></i> {{ $setting->alamat }}</li>
                    @endif
                    @if(!empty($setting->email))
                        <li><i class="bi bi-envelope-fill"></i> {{ $setting->email }}</li>
                    @endif
                    @if(!empty($setting->telepon))
                        <li><i class="bi bi-telephone-fill"></i> {{ $setting->telepon }}</li>
                    @endif
                    @if(!empty($setting->jam_operasional))
                        <li><i class="bi bi-clock-fill"></i> {{ $setting->jam_operasional }}</li>
                    @endif
                </ul>
            </div>
        </div>

        <hr class="footer-divider">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center gap-2">
            <p class="mb-0 footer-copy">&copy; {{ date('Y') }} {{ $setting->nama_sekolah ?? '' }}. Seluruh hak cipta dilindungi.</p>
            <p class="mb-0 footer-copy">Dibangun dengan <i class="bi bi-heart-fill text-danger"></i> menggunakan Laravel</p>
        </div>
    </div>
</footer>
