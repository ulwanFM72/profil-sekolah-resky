@extends('layouts.admin')

@section('title', 'Berita')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Berita</h6>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Berita</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Thumbnail</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($berita as $item)
                        <tr>
                            <td><img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text=B' }}" class="thumb" alt=""></td>
                            <td>{{ $item->judul }}</td>
                            <td><span class="badge-soft">{{ $item->kategori ?? '-' }}</span></td>
                            <td>{{ $item->tanggal->translatedFormat('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus berita ini?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $berita->links() }}</div>
    </div>

@endsection
