<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $laptops = Laptop::orderBy('id', 'desc')->get();

        return view('laptop.index')->with(('laptops'), $laptops);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('laptop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tanggal' => 'required',
            'sn' => 'required|unique:laptops,sn',
            'merek' => 'required',
            'type' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'status' => 'required',
            'kondisi' => 'required',
            'gambar' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
        ], [
            'tanggal' => 'Tanggal harus diisi',
            'sn' => 'Serial Number sudah terdaftar',
            'merek' => 'Masukkan merek laptop',
            'type' => 'Masukkan tipe laptop',
            'cpu' => 'Masukkan tipe procesor',
            'ram' => 'Masukkan kapasitas dan jenis RAM',
            'storage' => 'Masukkan kapasitas dan jenis SSD',
            'status' => 'Status laptop sekarang',
            'kondisi' => 'Kondisi laptop saat ini',
            'gambar:mimes' => 'extensi gambar tidak sesuai',
            'gambar:max' => 'Ukuran maksimal gambar 2 MB'
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
            'tanggal' => $request->tanggal,
            'sn' => strtoupper($request->sn),
            'merek' => $request->merek,
            'type' => $request->type,
            'cpu' => $request->cpu,
            'ram' => strtoupper($request->ram),
            'storage' => strtoupper($request->storage),
            'status' => $request->status,
            'kondisi' => $request->kondisi,
            'gambar' => $gambar_nama
        ];

        // Memasukkan data kedalam tabel
        Laptop::create($data);

        // Redirect ke halaman index
        return redirect()->to('laptop')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $laptop = Laptop::where('id', $id)->first();

        return view('laptop.edit')->with('laptop', $laptop);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $laptop = Laptop::where('id', $id)->first();

        return view('laptop.edit')->with('laptop', $laptop);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'tanggal' => 'required',
            'merek' => 'required',
            'type' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'status' => 'required',
            'kondisi' => 'required',
            'gambar' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
        ], [
            'tanggal' => 'Tanggal harus diisi',
            'sn' => 'Serial Number sudah terdaftar',
            'merek' => 'Masukkan merek laptop',
            'type' => 'Masukkan tipe laptop',
            'cpu' => 'Masukkan tipe procesor',
            'ram' => 'Masukkan kapasitas dan jenis RAM',
            'storage' => 'Masukkan kapasitas dan jenis SSD',
            'status' => 'Status laptop sekarang',
            'kondisi' => 'Kondisi laptop saat ini',
            'gambar:mimes' => 'extensi gambar tidak sesuai',
            'gambar:max' => 'Ukuran maksimal gambar 2MB'
        ]);

        // Validasi gambar baru
        if ($request->hasFile('gambar')) { // Jika ada gambar baru

            // Lakukan validasi
            $gambar_file = $request->file('gambar'); // mengambil file dari form
            $gambar_nama = date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama); // memindahkan file ke folder public agar bisa diakses

            // Hapus foto lama
            Storage::delete('public/gambar-laptop/' . $request->gambar_lama);

            // Masukkan namanya ke dalam database
            $data['gambar'] = $gambar_nama;
            Laptop::where('id', $id)->update($data);
        } else {
            $data['gambar'] = $request->gambar_lama;
        }

        $data = [
            'tanggal' => $request->tanggal,
            'sn' => strtoupper($request->sn),
            'merek' => $request->merek,
            'type' => $request->type,
            'cpu' => $request->cpu,
            'ram' => strtoupper($request->ram),
            'storage' => strtoupper($request->storage),
            'status' => $request->status,
            'kondisi' => $request->kondisi
        ];

        // dd($data);
        // Update data kedalam tabel
        Laptop::where('id', $id)->update($data);

        // Redirect ke halaman index
        return redirect()->to('laptop')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        // Cari nama file di storage yang ingin dihapus
        $gambar_nama = Laptop::where('id', $id)->first();

        // dd($gambar_nama['gambar']);

        // Hapus file di storage
        Storage::delete('public/gambar-laptop/' . $gambar_nama['gambar']);

        // Hapus data di database
        Laptop::where('id', $id)->delete();

        return redirect()->to('laptop')->with('success', 'Data berhasil dihapus');
    }
}
