@extends('layouts.admin')

@section('title', 'Jurusan')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Jurusan</h6>
            <a href="{{ route('admin.jurusan.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Jurusan</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Gambar</th><th>Nama</th><th>Singkatan</th><th>Kepala Jurusan</th><th>Siswa</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($jurusan as $item)
                        <tr>
                            <td><img src="{{ $item->gambar_sampul ? asset('storage/'.$item->gambar_sampul) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text='.$item->singkatan }}" class="thumb" alt=""></td>
                            <td>{{ $item->nama }}</td>
                            <td><span class="badge-soft">{{ $item->singkatan }}</span></td>
                            <td>{{ $item->kepala_jurusan ?? '-' }}</td>
                            <td>{{ $item->siswa_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.jurusan.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.jurusan.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus jurusan {{ $item->nama }}? Data siswa & galeri terkait juga akan terpengaruh.">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data jurusan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
