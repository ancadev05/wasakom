<?php

namespace App\Http\Controllers;

use App\Models\LaptopMerek;
use App\Models\Servisan;
use Illuminate\Http\Request;
use App\Models\ServisanTeknisi;
use Illuminate\Support\Facades\DB;

class LaporanTeknisiController extends Controller
{
    public function laporanteknisiharian(Request $request)
    {
        if ($request) {
            $tgl_awal = $request->tgl_awal;
            $tgl_akhir = $request->tgl_akhir;

            // $servisans = Servisan::where('status_pengerjaan', '1')->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])
            //     ->join('servisan_teknisis', 'servisans.id', '=', 'servisans.id')
            //     ->select('servisans.*', 'servisan_teknisis.*', 'servisans.id as servisan_id', 'servisan_teknisis.id as servisan_teknisi_id')
            //     ->where('servisan_teknisis.status', 'selesai')
            //     ->count();
                // ->get();

            $servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisan_teknisis.status as status', 'servisan_teknisis.jenis_kerusakan as jenis_kerusakan')
                ->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])
                ->get();

            // mencari servisan berdasarkan tanggal tertentu pada tabel servisan
            // $servisans = Servisan::where('status_pengerjaan', '1')->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])->get();
            
            // menghitung jumlah servisan 
            $total = count($servisans);

            // total servisan
            $total_servisan = count($servisans);

            // detail servisan 
            $detail_servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisan_teknisis.status as status', 'servisan_teknisis.user_id as teknisi', DB::raw('count(*) as total'))
                ->groupBy('status', 'teknisi')
                ->where('servisan_teknisis.user_id', 7)->orwhere('servisan_teknisis.user_id', 2)
                ->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])
                ->get();

            // merek unit servisan
            $merek_servisans = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                // ->join('laptop_mereks', 'servisans.laptop_merek_id', '=', 'laptop_mereks.id')
                ->select('servisans.laptop_merek_id as merek', DB::raw('count(*) as total'))
                ->groupBy('merek')
                ->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])
                ->get();
            $tms = count($merek_servisans);
            $jadi = false;
            if($tms >= 0) {
                for ($i=0; $i < $tms; $i++) { 
                // mengambil merek unit yang diservice
                $laptop_merek_id = $merek_servisans[$i]->merek;
                $laptop_merek = LaptopMerek::where('id', $laptop_merek_id)->first();
                $merek[] = $laptop_merek->merek;
                // mengambil setiap total dari merek yang diservice
                $merek_total[] = $merek_servisans[$i]->total;

                $jadi = [$merek, $merek_total];
            } 
        } else {
                $jadi = false;
            }
            
            // dd($jadi, $tgl_awal, $tgl_akhir);
            // detail servisan teknisi
            // $detail_servisan_teknisi = [
            //     [
            //         'tekniis' => 'Hamzah',
            //         'total' => $status,
            //         'selesai' => $total,
            //         'proses' => $total,
            //         'oper_vendor' => $total,
            //         'cancel' => $total,
            //     ],
            //     [
            //         'tekniis' => 'Muh Resky',
            //         'total' => $status,
            //         'selesai' => $total,
            //         'proses' => $total,
            //         'oper_vendor' => $total,
            //         'cancel' => $total,
            //     ],
            // ];

            // teknisi
            $teknisi = ServisanTeknisi::select('user_id')->groupBy('user_id')->get();
            // $status = ServisanTeknisi::select('status')->groupBy('status')->get();
            $total_status = count($servisans);
            for ($i=0; $i < $total_status; $i++) { 
                $list_status[] = $servisans[$i]->status;
            }

                // dd($detail_servisans);

            // $servisans = Servisan::where('status_pengerjaan', '1')->whereBetween('tgl_masuk',[$tgl_awal, $tgl_akhir])->get();

            return view('servisan.servisan-laporan-harian', compact(
                'tgl_awal', 
                'tgl_akhir', 
                'servisans', 
                'teknisi', 
                'total_servisan',
                'detail_servisans',
                'jadi',
                // 'total_selesai',
                // 'total_proses',
                // 'total_oper_vendor',
                // 'total_cancel',
            ));
        }
        return view('servisan.servisan-laporan-harian');
    }
}
