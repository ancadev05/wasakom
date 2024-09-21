<?php

namespace App\Http\Controllers;

use App\Models\LaptopMerek;
use App\Models\Servisan;
use Illuminate\Http\Request;
use App\Models\ServisanTeknisi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LaporanTeknisiController extends Controller
{
    public function laporanteknisiharian(Request $request)
    {
        if ($request) {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // mencari jumlah servisan berdasarkan tanggal tertentu 
            // di tabel servisan yang di join ke tabel servisan_teknisi
            $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisans.*', 'servisan_teknisis.*', 'servisan_teknisis.ket as keterangan')
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->get();

            // menghitung jumlah servisan berdasar tanggal tertentu 
            $total_servisan = count($servisans);

            // menghitung status servisan masing-masing teknisi (selesai, proses, ov, cancel)
            $total_status_servisan_teknisi = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisan_teknisis.status as status', 'servisan_teknisis.user_id', DB::raw('count(*) as total'))
                ->groupBy('status', 'servisan_teknisis.user_id')
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->orderBy('servisan_teknisis.user_id', 'asc')->orderBy('status', 'asc')
                ->get();

            // tingkat kerusakan
            $tingkat_kerusakan = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisan_teknisis.jenis_kerusakan', DB::raw('count(*) as total'))
                ->groupBy('servisan_teknisis.jenis_kerusakan')
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->get();
            // $tk = count($tingkat_kerusakan);
            // $servisan_kerusakan = false;
            // if ($tk >= 0) {
            //     for ($i = 0; $i < $tk; $i++) {
            //         $servisan_kerusakan[$i] = $tingkat_kerusakan[$i]->kerusakan;
            //         $total_kerusakan[$i] = $tingkat_kerusakan[$i]->total;

            //         $tingkat_kerusakan = [$servisan_kerusakan, $total_kerusakan];
            //     }
            // }

            // mencari jumlah merek produk (laptop) yang di servis pada tanggal tertentu
            $merek_servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                // ->join('laptop_mereks', 'servisans.laptop_merek_id', '=', 'laptop_mereks.id')
                ->select('servisans.laptop_merek_id as merek', DB::raw('count(*) as total'))
                ->groupBy('merek')
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->get();
            $tms = count($merek_servisans);
            $servisan_merek = false;
            if ($tms >= 0) {
                for ($i = 0; $i < $tms; $i++) {
                    // mengambil merek unit yang diservice
                    $laptop_merek_id = $merek_servisans[$i]->merek;
                    $laptop_merek = LaptopMerek::where('id', $laptop_merek_id)->first();
                    $merek[] = $laptop_merek->merek;
                    // mengambil setiap total dari merek yang diservice
                    $merek_total[] = $merek_servisans[$i]->total;

                    $servisan_merek = [$merek, $merek_total];
                }
            } else {
                $servisan_merek = false;
            }

            // alert jika tidak ada data ditemukan
            // if ($total_servisan > 0) {
                return view('servisan.servisan-laporan-harian', compact(
                    'tgl_awal',
                    'tgl_akhir',
                    'servisans',
                    'total_servisan',
                    'total_status_servisan_teknisi',
                    'servisan_merek',
                    'tingkat_kerusakan'
                ));
            // } else {
                // return redirect()->back()->with('not', 'Data tidak ditemukan');
            // }
        }

        return view('servisan.servisan-laporan-harian');
    }
}
