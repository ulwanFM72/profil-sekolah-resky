@extends('layouts.admin')

@section('title', 'Guru & Staff')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Guru & Staff</h6>
            <a href="{{ route('admin.guru.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Guru</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Mata Pelajaran</th><th>NIP</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($guru as $item)
                        <tr>
                            <td><img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text='.substr($item->nama,0,1) }}" class="thumb" alt=""></td>
                            <td>{{ $item->nama }}</td>
                            <td><span class="badge-soft">{{ $item->jabatan }}</span></td>
                            <td>{{ $item->mata_pelajaran ?? '-' }}</td>
                            <td>{{ $item->nip ?? '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.guru.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.guru.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus data guru {{ $item->nama }}?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data guru.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
