<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Servisan;
use App\Models\LaptopMerek;
use App\Models\ServisanTeknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servisans = Servisan::orderBy('tgl_masuk', 'desc')->orderBy('status_pengerjaan', 'asc')
            ->get();

        // mancari apakah servisan sudah diambil teknisi atau belum
        $servisan_teknisis = ServisanTeknisi::get();

        return view('servisan.index', compact(
            'servisans', 'servisan_teknisis'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $costumers = Costumer::get();
        $laptop_merek = LaptopMerek::get();

        return view ('servisan.servisan-create', compact(
            'costumers',
            'laptop_merek'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // pengecekan apakah ada costumer baru yang ditambahkan atau memakai costumer lama
        if($request->nama) {
            // penambahan costumer baru sebelum buat servisan
            $request->validate([
                'nama' => 'required',
                'no_wa' => 'required',
            ]);
            $costumer = [
                'nama' => $request->nama,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat,
                'foto_ktp' => 'ok',
            ];
            Costumer::create($costumer);

            // mengambil costumer id terakhir yang sudah dibuat
            // dengan metode mencari nama terakhir, lalu diurutkan berdasar urutan terakhir 
            // dan mengambil yang pertama, dalam hal ini costumer yang baru saja dibuat
            $costumer_id = Costumer::where('nama', $request->nama)->latest()->first()->id;
        } else {
            $costumer_id = $request->costumer_id;
        }

        
        $request->validate([
            // 'costumer_id' => 'required',
            'keluhan' => 'required',
            'merek' => 'required',
        ]);

        $gambar_nama = false;
        // Jika user upload gambar
        if ($request->hasFile('gambar')) {
            // Validasi gambar
            $gambar_file = $request->file('gambar'); // mengambil file dari form
            $gambar_nama = date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // meriname file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop-servisan/', $gambar_nama); // memindahkan file ke folder public agar bisa diakses
        }

        $no_servisan = 'SRV.' . date('ymd') .'.'. date('his');

        $servisan = [
            'tgl_masuk' => $request->tgl_masuk,
            'no_servisan' => $no_servisan,
            'costumer_id' => $costumer_id,
            'keluhan' => $request->keluhan,
            'laptop_merek_id' => $request->merek,
            'tipe' => $request->tipe,
            'kelengkapan' => $request->kelengkapan,
            'ket' => $request->ket,
            'gambar' => $gambar_nama,
            'user_id' => Auth::user()->id,
        ];

        Servisan::create($servisan);

        return redirect('/servisan')->with('success', 'Berhasil tambah servisan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servisan = Servisan::where('id', $id)->first();

        return view('servisan.servisan-nota', compact(
            'servisan'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $costumer = Costumer::get();
        $laptop_merek = LaptopMerek::get();
        $servisan = Servisan::where('id', $id)->first();

        return view('servisan.servisan-edit', compact(
            'costumer', 'laptop_merek', 'servisan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi gambar baru
        if ($request->hasFile('gambar')) { // Jika ada gambar baru
            // Lakukan validasi
            $gambar_file = $request->file('gambar'); // mengambil file dari form
            $gambar_nama = date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // penamaan file, antisipasi nama file double
            $gambar_file->storeAs('public/gambar-laptop-servisan/', $gambar_nama); // memindahkan file ke folder public agar bisa diakses dengan nama yang unik
            // Hapus foto lama
            Storage::delete('public/gambar-laptop-servisan/' . $request->gambar_lama);
            // Masukkan namanya ke dalam database
            $data['gambar'] = $gambar_nama;
            Servisan::where('id', $id)->update($data);
        }
        
        $servisan = [
            'tgl_masuk' => $request->tgl_masuk,
            'costumer_id' => $request->costumer_id,
            'keluhan' => $request->keluhan,
            'laptop_merek_id' => $request->merek,
            'tipe' => $request->tipe,
            'kelengkapan' => $request->kelengkapan,
            'ket' => $request->ket,
            'user_id' => Auth::user()->id,
        ];

        Servisan::where('id', $id)->update($servisan);

        return redirect('/servisan')->with('success', 'Berhasil update servisan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servisan = Servisan::where('id', $id)->first();
        $status_pengerjaan = $servisan->status_pengerjaan;
        
        if($status_pengerjaan == 0) {
            Servisan::where('id', $id)->delete();
            return redirect('/servisan')->with('success', 'Berhasil delete servisan!');
        };

        return redirect('/servisan')->with('info', 'Servisan sementara pengerjaan. Data tidak bisa dihapus!');
    }

    // menampilkan servisan yang selesai dikerjakan oleh teknisi
    public function servisanselesai()
    {
        $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
            ->select('servisans.*', 'servisan_teknisis.status', 'servisan_teknisis.id as servisan_teknisi_id')
            ->where('status', 'Selesai')
            ->get();

            return view('servisan.servisan-status.selesai', compact('servisans'));
    }
    // menampilkan servisan yang sementara proses dikerjakan oleh teknisi
    public function servisanproses()
    {
        $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
            ->select('servisans.*', 'servisan_teknisis.status')
            ->where('status', 'Proses')
            ->get();

            return view('servisan.servisan-status.proses', compact('servisans'));
    }
    // menampilkan servisan yang di oper ke vendor
    public function servisanov()
    {
        $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
            ->select('servisans.*', 'servisan_teknisis.status')
            ->where('status', 'Oper Vendor')
            ->get();

            return view('servisan.servisan-status.ov', compact('servisans'));
    }
    // menampilkan servisan yang sudah diambil
    public function servisandiambil()
    {
        $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
            ->select('servisans.*', 'servisan_teknisis.status')
            ->where('status', 'Diambil')
            ->get();

            return view('servisan.servisan-status.diambil', compact('servisans'));
    }
    // menampilkan servisan yang sudah diambil
    public function servisancancel()
    {
        $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
            ->select('servisans.*', 'servisan_teknisis.status')
            ->where('status', 'Cancel')
            ->get();

            return view('servisan.servisan-status.cancel', compact('servisans'));
    }

    // proses pengembalian servisan
    public function pengembalian(string $id)
    {
        $servisan_teknisi_id = $id;
        return view('servisan.servisan-status.kembalikan-servisan', compact('servisan_teknisi_id'));
    }
    public function prosespengembalian(Request $request)
    {
        $servisan_teknisi_id = $request->servisan_teknisi_id;

        $pp = 'diambil oleh ' . $request->pengambil . ' dari ' . $request->pemberi . '. ';
        $catatan = $request->catatan;

        $data = [
            'status' => 'Diambil',
            'catatan' => $pp . $catatan
        ];

        // dd($data);

        $servisanteknisi = ServisanTeknisi::where('id', $servisan_teknisi_id)->update($data);

        return redirect('/servisan-diambil')->with('success', 'Servisan telah diambil user!');
    }
}
