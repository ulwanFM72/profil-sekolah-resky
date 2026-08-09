@extends('layouts.admin')

@section('title', 'Ekstrakurikuler')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Ekstrakurikuler</h6>
            <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Ekstrakurikuler</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Gambar</th><th>Nama</th><th>Kategori</th><th>Pembina</th><th>Jadwal</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($ekstrakurikuler as $item)
                        <tr>
                            <td><img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text=E' }}" class="thumb" alt=""></td>
                            <td>{{ $item->nama }}</td>
                            <td><span class="badge-soft">{{ $item->kategori ?? '-' }}</span></td>
                            <td>{{ $item->pembina }}</td>
                            <td>{{ $item->jadwal }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus ekstrakurikuler {{ $item->nama }}?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data ekstrakurikuler.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
