<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAboutController extends Controller
{
    public function index()
    {
        $data = [
            'title'   => 'Manajemen About',
            'about'   => About::first(),
            'content' => 'admin/about/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request)
    {
        // Ambil data About yang pertama
        $About = About::first();

        // Validasi input
        $data = $request->validate([
            'name'  => 'required',
            'desc'  => 'required',
            'cover' => 'required|image|max:2048', // Pastikan file adalah gambar dan tidak lebih dari 2MB
        ]);

        // Upload gambar
        if ($request->hasFile('cover')) {
            // Hapus gambar lama jika ada
            if ($About->cover != null) {
                $oldCoverPath = public_path($About->cover); // Gunakan public_path()
                if (file_exists($oldCoverPath)) {
                    unlink($oldCoverPath);                } else {
                    Log::warning("File tidak ditemukan saat mencoba menghapus: " . $oldCoverPath);
                }
            }

            // Proses upload gambar baru
            $cover = $request->file('cover');
            $file_name = time() . '-' . $cover->getClientOriginalName();
            $storage = 'uploads/images/';

            // Pastikan folder tujuan ada
            if (!file_exists(public_path($storage))) {
                mkdir(public_path($storage), 0755, true); // Buat folder jika tidak ada
            }

            $cover->move(public_path($storage), $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            // Jika tidak ada file baru, tetap gunakan yang lama
            $data['cover'] = $About->cover;
        }

        // Update data About
        $About->update($data);
        return redirect('/admin/about');
    }
}
