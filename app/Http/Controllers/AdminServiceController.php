<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua service
        $data = [
            'title'   => 'Manajemen Service',
            'services' => Service::get(),
            'content' => 'admin/service/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form tambah service
        $data = [
            'title'  => 'Tambah Service',
            'content' => 'admin/service/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'title'      => 'required',
            'icon'       => 'required',
            'desc'       => 'required',
        ]);

        // Simpan data ke database
        Service::create($data);

        return redirect('/admin/service')->with('success', 'Service berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit service
        $data = [
            'title'     => 'Edit Service',
            'service'   => Service::find($id),
            'content'   => 'admin/service/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil service yang akan diedit
        $service = Service::find($id);

        // Validasi input
        $data = $request->validate([
            'title'      => 'required',
            'icon'       => 'required',
            'desc'       => 'required',
        ]);

        // Update data service
        $service->update($data);

        return redirect('/admin/service')->with('success', 'Service berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus service
        $service = Service::find($id);
        $service->delete();

        return redirect('/admin/service')->with('success', 'Service berhasil dihapus!');
    }
}
