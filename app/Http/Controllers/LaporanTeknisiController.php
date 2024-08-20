<?php

namespace App\Http\Controllers;

use App\Models\Servisan;
use App\Models\ServisanTeknisi;
use Illuminate\Http\Request;

class LaporanTeknisiController extends Controller
{
    public function laporanteknisiharian(Request $request)
    {
        if ($request) {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            $servisans = Servisan::where('status_pengerjaan', '1')->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])->get();
            return view('servisan.servisan-laporan-harian', compact(
                'tgl_awal', 'tgl_akhir', 'servisans'
            ));
        }
        return view('servisan.servisan-laporan-harian');
    }
}
