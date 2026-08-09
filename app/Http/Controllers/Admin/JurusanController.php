<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\JurusanGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::withCount('siswa')->orderBy('nama')->get();

        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'singkatan' => ['required', 'string', 'max:20'],
            'kepala_jurusan' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar_sampul' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['slug'] = Str::slug($data['singkatan']);

        if ($request->hasFile('gambar_sampul')) {
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        $jurusan->load('galeri');

        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'singkatan' => ['required', 'string', 'max:20'],
            'kepala_jurusan' => ['nullable', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar_sampul' => ['nullable', 'image', 'max:2048'],
        ]);

        $data['slug'] = Str::slug($data['singkatan']);

        if ($request->hasFile('gambar_sampul')) {
            if ($jurusan->gambar_sampul) {
                Storage::disk('public')->delete($jurusan->gambar_sampul);
            }
            $data['gambar_sampul'] = $request->file('gambar_sampul')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar_sampul) {
            Storage::disk('public')->delete($jurusan->gambar_sampul);
        }
        $jurusan->delete();

        return back()->with('success', 'Jurusan berhasil dihapus.');
    }

    // ==== Galeri per jurusan (sub-resource sederhana) ====

    public function storeGaleri(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'max:2048'],
        ]);

        JurusanGaleri::create([
            'jurusan_id' => $jurusan->id,
            'judul' => $request->judul,
            'gambar' => $request->file('gambar')->store('jurusan', 'public'),
        ]);

        return back()->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function destroyGaleri(Jurusan $jurusan, JurusanGaleri $galeri)
    {
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $galeri->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }
}
