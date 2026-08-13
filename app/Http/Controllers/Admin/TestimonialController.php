<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::latest()->get();

        return view('admin.testimonial.index', compact('testimonial'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\.\,\-\']+$/u'],
            'jurusan_kelas' => ['nullable', 'string', 'max:100'],
            'isi_testimoni' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ], [
            'nama.regex' => 'Nama hanya boleh berisi huruf.',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('testimonial', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jurusan_kelas' => ['nullable', 'string', 'max:100'],
            'isi_testimoni' => ['required', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            if ($testimonial->foto) {
                Storage::disk('public')->delete($testimonial->foto);
            }
            $data['foto'] = $request->file('foto')->store('testimonial', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->foto) {
            Storage::disk('public')->delete($testimonial->foto);
        }
        $testimonial->delete();

        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
