@extends('layouts.admin')

@section('title', 'Prestasi')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Prestasi</h6>
            <a href="{{ route('admin.prestasi.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Prestasi</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Nama Prestasi</th><th>Siswa</th><th>Kategori</th><th>Tingkat</th><th>Tahun</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($prestasi as $item)
                        <tr>
                            <td>{{ $item->nama_prestasi }}</td>
                            <td>{{ $item->nama_siswa ?? '-' }}</td>
                            <td><span class="badge-soft">{{ $item->kategori }}</span></td>
                            <td>{{ $item->tingkat }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus prestasi ini?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data prestasi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
