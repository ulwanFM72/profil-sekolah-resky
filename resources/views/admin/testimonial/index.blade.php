@extends('layouts.admin')

@section('title', 'Testimoni')

@section('content')

    <div class="admin-panel">
        <div class="admin-panel-header">
            <h6 class="mb-0">Daftar Testimoni</h6>
            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-sm btn-navy-admin rounded-pill"><i class="bi bi-plus-lg"></i> Tambah Testimoni</a>
        </div>
        <div class="table-responsive">
            <table class="table admin-table align-middle mb-0">
                <thead><tr><th>Foto</th><th>Nama</th><th>Jurusan/Kelas</th><th>Isi Testimoni</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($testimonial as $item)
                        <tr>
                            <td><img src="{{ $item->foto ? asset('storage/'.$item->foto) : 'https://placehold.co/80x80/1E3A8A/FFFFFF?text='.substr($item->nama,0,1) }}" class="thumb" alt=""></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jurusan_kelas ?? '-' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->isi_testimoni, 60) }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.testimonial.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.testimonial.destroy', $item->id) }}" method="POST" class="d-inline btn-delete-confirm" data-confirm="Hapus testimoni ini?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada testimoni.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
