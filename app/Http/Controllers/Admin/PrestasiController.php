<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::orderBy('tahun', 'desc')->get();

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'nama_siswa' => ['nullable', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'in:Akademik,Non Akademik'],
            'tahun' => ['required', 'integer', 'min:2000', 'max:2100'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate([
            'nama_prestasi' => ['required', 'string', 'max:255'],
            'nama_siswa' => ['nullable', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'in:Akademik,Non Akademik'],
            'tahun' => ['required', 'integer', 'min:2000', 'max:2100'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $prestasi->delete();

        return back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
