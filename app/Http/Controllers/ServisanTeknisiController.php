<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Servisan;
use Illuminate\Http\Request;
use App\Models\ServisanTeknisi;
use Illuminate\Support\Facades\Auth;

class ServisanTeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servisan_teknisis = ServisanTeknisi::orderBy('id', 'desc')->get();
        return view('servisan.servisan-teknisi', compact(
            'servisan_teknisis'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $costumer = Costumer::get();

        // menampilkan servisan yang baru masuk atau belum dikerjakan
        $servisans = Servisan::where('status_pengerjaan', 0)->orderBy('tgl_masuk', 'desc')->get();

        return view('servisan.servisan-teknisi-create', compact(
            'costumer',
            'servisans'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // mencari id servisan sesuai yang dipilih
        $servisan = Servisan::where('id', $request->servisan_id)->first();

        // mengubah status pengerjaan servisan menjadi satu (berarti servisan sudah dikerjakan)
        $status_pengerjaan = [
            'status_pengerjaan' => 1
        ];
        Servisan::where('id', $request->servisan_id)->update($status_pengerjaan);
        
        $servisan_teknisi = [
            'servisan_id' => $servisan->id,
            'user_id' => Auth::user()->id
        ];

        ServisanTeknisi::create($servisan_teknisi);

        return redirect('/servisan-teknisi')->with('success', 'Berhasil ambil servisan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servisan_teknisi = ServisanTeknisi::where('id', $id)->first();
        $status = [
            'status' => ['Selesai', 'Proses', 'Oper Vendor', 'Cancel']
        ];

        return view('servisan.servisan-teknisi-show', compact(
            'servisan_teknisi', 'status'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servisan_teknisi = ServisanTeknisi::where('id', $id)->first();
        $status = [
            'status' => ['Selesai', 'Proses', 'Oper Vendor', 'Cancel']
        ];

        return view('servisan.servisan-teknisi-edit', compact(
            'servisan_teknisi', 'status'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $servisan_teknisi = [
            'kerusakan' => $request->kerusakan,
            'status' => $request->status,
            'estimasi' => $request->estimasi,
            'tgl_selesai' => $request->tgl_selesai,
            'jenis_kerusakan' => $request->jenis_kerusakan,
            'ket' => $request->ket,
            'catatan' => $request->ket,
            'user_id' => Auth::user()->id
        ];

        // dd($servisan_teknisi);

        ServisanTeknisi::where('id', $id)->update($servisan_teknisi);

        return redirect('/servisan-teknisi')->with('success', 'Berhasil update servisan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servisan_teknisi = ServisanTeknisi::where('id', $id)->first();
        $servisan_id = $servisan_teknisi->servisan_id;

        // mengembalikan status pengerjaan jika servisan batal dikerjakan
        $status_pengerjaan = [
            'status_pengerjaan' => 0
        ];
        Servisan::where('id', $servisan_id)->update($status_pengerjaan);

        // batalkan servisan teknisi
        ServisanTeknisi::where('id', $id)->delete();
        
        return redirect('/servisan-teknisi')->with('success', 'Berhasil batalkan servisan!');
    }
}
