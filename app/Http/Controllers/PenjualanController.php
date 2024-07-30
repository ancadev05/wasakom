<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Laptop;
use App\Models\LaptopMerek;
use App\Models\LaptopTerjual;
use App\Models\LaptopTipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function laptopterjual()
    {
        $laptop_terjual = LaptopTerjual::orderBy('id', 'desc')->get();

        return view('penjualan.laptop-terjual')
            ->with('laptop_terjual', $laptop_terjual);
    }

    public function laptopdisplay()
    {
        $costumers = Costumer::get();
        $laptops = Laptop::where('laptop_status_id', 1)->where('laptop_kondisi_id', 1)->orderBy('id', 'desc')->get();

        return view('penjualan.laptop-display', compact('costumers', 'laptops'));
    }

    public function juallaptop(Request $request)
    {
        $request->validate([
            'laptop_id' => 'required'
        ]);

        $user = Auth::user()->id;

        // mencari merek
        $laptop = Laptop::where('id', $request->laptop_id)->first();
        $laptop_merek = LaptopMerek::where('id', $laptop->laptop_merek_id)->first();
        $merek = $laptop_merek->merek;

        // mencari tipe
        $laptop_tipe = LaptopTipe::where('id', $laptop->laptop_tipe_id)->first();
        $tipe = $laptop_tipe->tipe;

        $laptop_terjual = [
            'tgl_jual' => $request->tgl_jual,
            'mt' => '#' . $laptop->id . $merek . '-' . $tipe,
            'spesifikasi' => $laptop->cpu . '/' . $laptop->gpu . '/' . $laptop->ram . '/' . $laptop->storage,
            'harga_jual' => $request->harga_jual,
            'keterangan' => $request->keterangan,
            'costumer_id' => $request->costumer_id,
            'user_id' => $user
        ];

        // dd($laptop_terjual);

        // manambahkan laptop ketabel yang sudah terjual
        LaptopTerjual::create($laptop_terjual);

        // menghapus laptop yang sudah terjual dari daftar laptop
        Laptop::where('id', $request->laptop_id)->delete();

        return redirect('/laptop-terjual');
    }
}
