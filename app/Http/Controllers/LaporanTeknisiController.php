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
                ->select('servisan_teknisis.status as status', 'servisan_teknisis.user_id as teknisi', DB::raw('count(*) as total'))
                ->groupBy('status', 'teknisi')
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->orderBy('teknisi', 'asc')->orderBy('status', 'asc')
                ->get();

            // dd($total_status_servisan_teknisi);
            // hitung jumlah teknisi yang bekerja di tanggal tertentu
            $teknisi = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                ->select('servisan_teknisis.user_id as teknisi')
                ->groupBy('teknisi')->distinct()
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->orderBy('teknisi', 'asc')
                ->get();

            // mencaridetail servisan berdasarkan teknisi tertentu
            for ($i = 0; $i < $teknisi->count(); $i++) {
                // mengambil id teknisi sesuai jumlah teknisi yang ada 
                $teknisi_id[$i] = $teknisi[$i]->teknisi;
                $nama_teknisi[] = User::where('id', $teknisi_id[$i])->first()->karyawan->nama; // mencari nama teknisi

                // mencari status servisan berdasarkan teknisi tertentu
                $servisan_teknisi[$i] = Servisan::join('servisan_teknisis', 'servisans.id', '=', 'servisan_teknisis.servisan_id')
                    ->select('servisan_teknisis.status as status', 'servisan_teknisis.user_id as teknisi', DB::raw('count(*) as total'))
                    ->groupBy('status', 'teknisi')
                    ->where('servisan_teknisis.user_id', $teknisi_id[$i])
                    ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                    ->orderBy('status', 'asc')
                    ->get();

                for ($i = 0; $i < $teknisi->count(); $i++) {
                    foreach ($servisan_teknisi as $i => $value) {
                        $selesai[$i] = $servisan_teknisi[$i][0]->total;
                    }
                }



                // $servisan_teknisi = [
                //     'teknisi' => $nama_teknisi,
                //     'servisan' => [44, 55, 57, 56]
                // ];
            }

            // dd($kerja_teknisi[0]);
            // dd($teknisi[0]->user->sandi);
            // dd($selesai);

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


            // dd($servisan_merek);
            // teknisi
            $teknisi = ServisanTeknisi::select('user_id')->groupBy('user_id')->get();
            // $status = ServisanTeknisi::select('status')->groupBy('status')->get();
            $total_status = count($servisans);
            for ($i = 0; $i < $total_status; $i++) {
                $list_status[] = $servisans[$i]->status;
            }

            return view('servisan.servisan-laporan-harian', compact(
                'tgl_awal',
                'tgl_akhir',
                'servisans',
                'teknisi',
                'total_servisan',
                'total_status_servisan_teknisi',
                'servisan_merek',
            ));
        }
        return view('servisan.servisan-laporan-harian');
    }
}
