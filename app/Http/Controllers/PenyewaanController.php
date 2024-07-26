<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Laptop;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaanController extends Controller
{
    public function index()
    {
        $laptop = Laptop::where('laptop_status_id', 5)->get();

        // $penyewaan = Penyewaan::get();
        $penyewaan = Penyewaan::select('created_at', 'costumer_id', 'tgl_mulai', 'tgl_selesai')
            ->groupBy('created_at', 'costumer_id', 'tgl_mulai', 'tgl_selesai')->get();

        return view('penyewaan.penyewaan')
            ->with('penyewaan', $penyewaan);
    }

    public function dalampenyewaan()
    {
        $laptop = Laptop::where('laptop_status_id', 5)->get();
        $penyewaan = Penyewaan::get();

        return view('penyewaan.penyewaan')
            ->with('penyewaan', $penyewaan);
    }

    public function penyewaanbuat()
    {
        $costumers = Costumer::get();
        $laptops = Laptop::where('laptop_status_id', 2)
            ->where('laptop_kondisi_id', 1)->get();

        return view('penyewaan.penyewaan-buat')
            ->with('costumers', $costumers)
            ->with('laptops', $laptops);
    }

    public function penyewaanstore(Request $request)
    {
        $user_id = Auth::user()->id;

        // menangkap kedalam sebuah arry laptop yang di pilih
        $laptop_id = $request->input('laptop_id');
        $count = count($laptop_id) - 1; // menghitung berapa laptop dalam array
        $list_laptop = []; // membuat variabel data list laptop kadalam sebuah variabel array

        // mengubah status laptop ke penyewaan
        $status_laptop = ['laptop_status_id' => 5];

        // memasukkan data dengan perulangan
        for ($i = 0; $i <= $count; $i++) {

            Laptop::where('id', $laptop_id[$i])->update($status_laptop); // mengubah status laptop yang dipilih ke penyewaaan

            $list_laptop[] = [
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'costumer_id' => $request->costumer_id,
                'laptop_id' => $laptop_id[$i],
                'user_id' => $user_id
                ];
        }

        foreach ($list_laptop as $key => $value) {
            Penyewaan::create($value);
        }

        return redirect('/penyewaan');

    }

    public function penyewaanselesai(string $id)
    {
        Penyewaan::where('id', $id)->delete();

        return redirect('/penyewaan');
    }
}
