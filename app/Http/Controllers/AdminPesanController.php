<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class AdminPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua pesan
        $data = [
            'title'   => 'Manajemen Pesan',
            'pesan'   => Pesan::orderBy('created_at', 'desc')->get(),
            'content' => 'admin/pesan/index'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan form untuk membuat pesan baru
        $data = [
            'title'   => 'Tambah Pesan',
            'content' => 'admin/pesan/create'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'field_name' => 'required|string|max:255', 
        ]);

        // Simpan data pesan
        Pesan::create($validatedData);

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = Pesan::find($id);
        $pesan->is_read = 1;
        $pesan->save();

        $data = [
            'title'   => 'Detail Pesan',
            'pesan'   => Pesan::find($id),
            'content' => 'admin/pesan/show'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Ambil pesan berdasarkan ID
        $pesan = Pesan::findOrFail($id);

        $data = [
            'title'   => 'Edit Pesan',
            'pesan'   => $pesan,
            'content' => 'admin/pesan/edit'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'field_name' => 'required|string|max:255', // Sesuaikan field_name dengan field yang benar
        ]);

        // Cari pesan berdasarkan ID dan update
        $pesan = Pesan::findOrFail($id);
        $pesan->update($validatedData);

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari pesan berdasarkan ID dan hapus
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
