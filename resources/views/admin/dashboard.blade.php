@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="row g-3 mb-4">
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-1"><i class="bi bi-diagram-3-fill"></i></div>
                <div><h3>{{ $counts['jurusan'] }}</h3><span>Jurusan</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-2"><i class="bi bi-newspaper"></i></div>
                <div><h3>{{ $counts['berita'] }}</h3><span>Berita</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-3"><i class="bi bi-person-workspace"></i></div>
                <div><h3>{{ $counts['guru'] }}</h3><span>Guru & Staff</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-4"><i class="bi bi-people-fill"></i></div>
                <div><h3>{{ $counts['siswa'] }}</h3><span>Siswa</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-1"><i class="bi bi-stars"></i></div>
                <div><h3>{{ $counts['ekstrakurikuler'] }}</h3><span>Ekstrakurikuler</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-2"><i class="bi bi-images"></i></div>
                <div><h3>{{ $counts['galeri'] }}</h3><span>Foto Galeri</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-3"><i class="bi bi-trophy-fill"></i></div>
                <div><h3>{{ $counts['prestasi'] }}</h3><span>Prestasi</span></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="dash-card">
                <div class="dash-icon bg-navy-4"><i class="bi bi-chat-quote-fill"></i></div>
                <div><h3>{{ $counts['testimonial'] }}</h3><span>Testimoni</span></div>
            </div>
        </div>
    </div>

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Berita Terbaru</h6>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Berita</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Judul</th><th>Kategori</th><th>Tanggal</th><th></th></tr></thead>
                <tbody>
                    @forelse($beritaTerbaru as $b)
                        <tr>
                            <td>{{ $b->judul }}</td>
                            <td><span class="badge-soft">{{ $b->kategori ?? '-' }}</span></td>
                            <td>{{ $b->tanggal->translatedFormat('d M Y') }}</td>
                            <td class="text-end"><a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
