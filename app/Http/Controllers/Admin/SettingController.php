<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::current();

        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::current();

        $data = $request->validate([
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'npsn' => ['nullable', 'string', 'max:20'],
            'status' => ['nullable', 'string', 'max:50'],
            'akreditasi' => ['nullable', 'string', 'max:10'],
            'tahun_berdiri' => ['nullable', 'string', 'max:10'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'maps_lat' => ['nullable', 'string', 'max:50'],
            'maps_lng' => ['nullable', 'string', 'max:50'],
            'sejarah' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'sambutan_kepala' => ['nullable', 'string'],
            'nama_kepala_sekolah' => ['nullable', 'string', 'max:255'],
            'jam_operasional' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:1024'],
            'hero_image' => ['nullable', 'image', 'max:2048'],
        ], [
            'nama_sekolah.regex' => 'Nama sekolah hanya boleh berisi huruf.',
            'nama_kepala_sekolah.regex' => 'Nama kepala sekolah hanya boleh berisi huruf.',
        ]);

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('setting', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('setting', 'public');
        }

        $setting->update($data);

        return back()->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
