<?php

namespace App\Http\Controllers;

use App\Models\tipe_leptop;
use Illuminate\Http\Request;

class TipeLaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipe-laptop.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe-laptop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_merek' => 'required',
            'tipe' => 'required',
            'gambar' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
        ]);

        $gambar_nama = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar')) {

            // Validasi gambar
            $gambar_file = $request->file('gambar'); // mengambil file dari form
            $gambar_nama = date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama); // memindahkan file ke folder public agar bisa diakses
        }

        $data = [
            'id_merek' => $request->id_merek,
            'tipe' => $request->tipe,
            'gambar' => $gambar_nama
        ];

        // Memasukkan data kedalam tabel
        tipe_leptop::create($data);

        // Redirect ke halaman index
        return redirect()->to('tipe-laptop')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
