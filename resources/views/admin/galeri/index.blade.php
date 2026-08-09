@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Galeri Sekolah</h6>
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Foto</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Judul</th><th>Kategori</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($galeri as $item)
                        <tr>
                            <td><img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text=G' }}" class="thumb" alt=""></td>
                            <td>{{ $item->judul }}</td>
                            <td><span class="badge-soft">{{ $item->kategori }}</span></td>
                            <td class="text-end">
                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus foto ini?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada foto galeri.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
