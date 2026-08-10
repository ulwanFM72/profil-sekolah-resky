<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <strong>{{ $setting->nama_sekolah ?? '' }}</strong>
                <p>{{ $setting->visi ?? '' }}</p>
                <div class="footer-social">
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    @if(!empty($setting->whatsapp))
                        <a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    @endif
                </div>
            </div>

            <div class="footer-col">
                <h6>Navigasi</h6>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                    <li><a href="{{ route('guru') }}">Guru & Staff</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h6>Informasi</h6>
                <ul>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('news.index') }}">Berita</a></li>
                    <li><a href="{{ route('achievement') }}">Prestasi</a></li>
                    <li><a href="{{ route('spmb') }}">SPMB</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h6>Kontak</h6>
                <ul class="footer-contact">
                    @if(!empty($setting->alamat))<li><i class="bi bi-geo-alt-fill"></i> {{ $setting->alamat }}</li>@endif
                    @if(!empty($setting->email))<li><i class="bi bi-envelope-fill"></i> {{ $setting->email }}</li>@endif
                    @if(!empty($setting->telepon))<li><i class="bi bi-telephone-fill"></i> {{ $setting->telepon }}</li>@endif
                    @if(!empty($setting->jam_operasional))<li><i class="bi bi-clock-fill"></i> {{ $setting->jam_operasional }}</li>@endif
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} {{ $setting->nama_sekolah ?? '' }}. Seluruh hak cipta dilindungi.</span>
            <span>NPSN {{ $setting->npsn ?? '—' }}</span>
        </div>
    </div>
</footer>
