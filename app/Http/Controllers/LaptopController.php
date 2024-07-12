<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\Laptop;
use App\Models\LaptopMerek;
use App\Models\LaptopTipe;
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
        $laptop_merek = LaptopMerek::get();
        $laptop_tipe = LaptopTipe::get();

        return view('laptop.create')
            ->with('laptop_merek', $laptop_merek)
            ->with('laptop_tipe', $laptop_tipe);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // name object yang dimasukkan dibawah ini sesuai name pada form
        $request->validate([
            'tgl' => 'required',
            'sn' => 'required|unique:laptops,sn',
            'merek' => 'required',
            'tipe' => 'required',
            'cpu' => 'required',
            'gpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            // 'interfaces_storage' => 'required',
            'status' => 'required',
            'kondisi' => 'required'
        ]
    );

        $data = [
            'tgl' => $request->tgl,
            'sn' => strtoupper($request->sn),
            'kode_barang' => strtoupper($request->kode_barang),
            'cpu' => $request->cpu,
            'gpu' => $request->gpu,
            'ram' => strtoupper($request->ram),
            'storage' => strtoupper($request->storage),
            'interfaces_storage' => $request->interfaces_storage,
            'status' => $request->status,
            'kondisi' => $request->kondisi,
            'laptop_merek_id' => $request->merek,
            'laptop_tipe_id' => $request->tipe,
            'keterangan' => $request->keterangan
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
        $laptop_merek = LaptopMerek::get();
        $laptop_tipe = LaptopTipe::get();

        return view('laptop.edit')
            ->with('laptop_merek', $laptop_merek)
            ->with('laptop_tipe', $laptop_tipe)
            ->with('laptop', $laptop);
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
            'kode_barang' => strtoupper($request->kode_barang),
            'cpu' => $request->cpu,
            'ram' => strtoupper($request->ram),
            'storage' => strtoupper($request->storage),
            'status' => $request->status,
            'kondisi' => $request->kondisi,
            'laptop_merek_id' => $request->merek,
            'laptop_tipe_id' => $request->tipe,
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

    // menampilkan merek dan tipe laptop
    public function mt()
    {
        $laptop_merek = LaptopMerek::get();
        $laptop_tipe = LaptopTipe::get();
        return view('laptop.merek-tipe')
            ->with('laptop_merek', $laptop_merek)
            ->with('laptop_tipe', $laptop_tipe);
    }

    // tambah merek laptop
    public function tambahmerek(Request $request)
    {
        $merek = [
            'merek' => strtoupper($request->merek)
        ];

        LaptopMerek::create($merek);

        return redirect('/mt');
    }
    // hapus merek
    public function hapusmerek(string $id)
    {
        LaptopMerek::where('id', $id)->delete();

        return redirect('/mt');
    }

    // tambah tipe
    public function tambahtipe()
    {
        $laptop_merek = LaptopMerek::get();

        return view('laptop.tipe-laptop-tambah')
            ->with('laptop_merek', $laptop_merek);
    }
    // tipe store
    public function tipestore(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'tipe' => 'required',
            'gambar_1' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
            'gambar_2' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
            'gambar_3' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
            'gambar_4' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
            'gambar_5' => 'file|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048'
        ]);

        $gambar_nama_1 = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar_1')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar_1'); // mengambil file dari form
            $gambar_nama_1 = '1-' . date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama_1); // memindahkan file ke folder public agar bisa diakses
        }
        $gambar_nama_2 = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar_2')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar_2'); // mengambil file dari form
            $gambar_nama_2 = '2-' . date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama_2); // memindahkan file ke folder public agar bisa diakses
        }
        $gambar_nama_3 = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar_3')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar_3'); // mengambil file dari form
            $gambar_nama_3 = '3-' . date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama_3); // memindahkan file ke folder public agar bisa diakses
        }
        $gambar_nama_4 = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar_4')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar_4'); // mengambil file dari form
            $gambar_nama_4 = '4-' . date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama_4); // memindahkan file ke folder public agar bisa diakses
        }
        $gambar_nama_5 = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar_5')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar_5'); // mengambil file dari form
            $gambar_nama_5 = '5-' . date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop/', $gambar_nama_5); // memindahkan file ke folder public agar bisa diakses
        }


        // dd($request);

        $tipe = [
            'laptop_merek_id' => $request->merek,
            'tipe' => $request->tipe,
            'layar_size' => $request->layar_size,
            'layar_resolusi' => strtoupper($request->layar_resolusi),
            'gambar_1' => $gambar_nama_1,
            'gambar_2' => $gambar_nama_2,
            'gambar_3' => $gambar_nama_3,
            'gambar_4' => $gambar_nama_4,
            'gambar_5' => $gambar_nama_5,
        ];

        LaptopTipe::create($tipe);

        return redirect('/mt');
    }

    // lihat tipe
    public function lihattipe(string $id)
    {
        $laptop_merek = LaptopMerek::get();
        $laptop_tipe = LaptopTipe::where('id', $id)->first();

        return view('laptop.tipe-laptop-lihat')
            ->with('laptop_merek', $laptop_merek)
            ->with('laptop_tipe', $laptop_tipe);
    }
}
