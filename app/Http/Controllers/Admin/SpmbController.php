<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpmbInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpmbController extends Controller
{
    public function edit()
    {
        $spmb = SpmbInfo::current();

        return view('admin.spmb.edit', compact('spmb'));
    }

    public function update(Request $request)
    {
        $spmb = SpmbInfo::current();

        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date'],
            'syarat_pendaftaran' => ['nullable', 'string'],
            'alur_pendaftaran' => ['nullable', 'string'],
            'biaya_pendaftaran' => ['nullable', 'string', 'max:255'],
            'link_pendaftaran' => ['nullable', 'string', 'max:255'],
            'brosur' => ['nullable', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
        ]);

        if ($request->hasFile('brosur')) {
            if ($spmb->brosur) {
                Storage::disk('public')->delete($spmb->brosur);
            }
            $data['brosur'] = $request->file('brosur')->store('spmb', 'public');
        }

        $spmb->update($data);

        return back()->with('success', 'Informasi SPMB berhasil diperbarui.');
    }
}
