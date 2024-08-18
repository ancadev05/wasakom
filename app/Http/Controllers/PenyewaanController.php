<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Laptop;
use App\Models\LaptopMerek;
use App\Models\LaptopTipe;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyewaanController extends Controller
{
    public function index()
    {
        $laptop = Laptop::where('laptop_status_id', 5)->get();

        // $penyewaan = Penyewaan::get();
        $penyewaan = Penyewaan::select('costumer_id', 'tgl_mulai', 'tgl_selesai')
            ->groupBy('costumer_id', 'tgl_mulai', 'tgl_selesai')->orderBy('tgl_selesai', 'asc')->get();

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

        $request->validate([
            'costumer_id' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'laptop_id' => 'required',
        ]);

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
    // hapus unit yang batal disewap
    public function penyewaanhapusunit(string $idcostumer, $idunit, $tglmulai, $tglselesai)
    {
        // dd($idcostumer, $idunit);
        // menghapus unit yang dipilih dari tabel penyewaan
        Penyewaan::where('laptop_id', $idunit)->delete();

        // mengubah kembali status laptop ke penyewaan (kembali ketoko)
        $status_laptop = [
            'laptop_status_id' => 2
        ];

        Laptop::where('id', $idunit)->update($status_laptop);

        // mencari costumer id apa masi ada atau tidak
        $costumer_id = Penyewaan::where('costumer_id', $idcostumer)->first();
        
        // redirect kembali kehalaman jika masi ada item yang disewa oleh costumer
        if($costumer_id) {
            return redirect('/penyewaan-costumer/' . $idcostumer . '/' . $tglmulai . '/' . $tglselesai);
        } 
        
        // redirect kehalaman penyewaan jika costumer sudah tidak ada
        return redirect('/penyewaan');
    }
    // penyewaan edit
    public function penyewaanedit(string $idcostumer)
    {
        $costumer = Costumer::get();
        $penyewaan = Penyewaan::where('costumer_id', $idcostumer)->first();
        $laptops = Laptop::where('laptop_status_id', 2)
            ->where('laptop_kondisi_id', 1)->get();
        return view('penyewaan.penyewaan-edit', compact('costumer', 'penyewaan', 'laptops'));
    }
    // penyewaan update
    public function penyewaanupdate(Request $request, string $idcostumer, $tglmulai, $tglselesai)
    {
        $user_id = Auth::user()->id;

        $request->validate([
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        // menangkap kedalam sebuah arry laptop yang di pilih
        $laptop_id = $request->input('laptop_id');

        if ($laptop_id) {
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
        }

        $data = [
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'costumer_id' => $request->costumer_id,
            'user_id' => $user_id
        ];

        Penyewaan::where('costumer_id', $idcostumer)->where('tgl_mulai', $tglmulai)->where('tgl_selesai', $tglselesai)->update($data);

        // manampilkan data penyewaan dari costumer baru yang sudah diubah
        $idcostumerbaru = Penyewaan::where('costumer_id', $request->costumer_id)->first();
        $costumerbaru = $idcostumerbaru->costumer_id;

        return redirect('/penyewaan-costumer/' . $costumerbaru . '/' . $idcostumerbaru->tgl_mulai . '/' . $idcostumerbaru->tgl_selesai);
    }

    // untuk melihat item apa saja yang di sewa dan status penyewaan costumer
    public function penyewaancostumer(string $id, $tglmulai, $tglselesai)
    {
        $costumer = Penyewaan::where('costumer_id', $id)->first();
        $penyewaans = Penyewaan::where('costumer_id', $id)->where('tgl_mulai', $tglmulai)->where('tgl_selesai', $tglselesai)->get();
        $jumlahunitsewa = count($penyewaans) - 1;

        // dd($jumlahunitsewa);
        // mengambil semua id laptop yang disewa
        for ($i = 0; $i <= $jumlahunitsewa; $i++) {
            $id_laptop[] = $penyewaans[$i]->laptop_id;
        }
        // dd($id_laptop);
        $jumlahunit = count($id_laptop); // menghitung jumlah unit untuk perulangan

        // 
        for ($i = 0; $i < $jumlahunit; $i++) {
            // mencari id laptop pertama
            $id = $id_laptop[$i];
            $laptop = Laptop::where('id', $id)->first(); // spek laptop yang di dapat sesuai id

            $mrk = LaptopMerek::where('id', $laptop->laptop_merek_id)->first();
            $tp = LaptopTipe::where('id', $laptop->laptop_tipe_id)->first();

            // memasukkan spek laptop sesuai id 
            $speklaptop[] = [
                'id' => $laptop->id,
                'mt' => $mrk->merek . '-' . $tp->tipe,
                'spek' => $laptop->cpu . '/' . $laptop->gpu . '/' . $laptop->ram . '/' . $laptop->storage
            ];
        }

        foreach ($speklaptop as $key => $value) {
            $laptop = $value;
        }

        // data laptop yang akan ditampilkan dalam surat penyewaan
        // menghitung jumlah masing-masing unit yang disewa
        for ($i=0; $i < $jumlahunit; $i++) { 
            $hitunglaptop[] = $speklaptop[$i]['mt'];
        }
        $hitung = array_count_values($hitunglaptop);

        
        // dd($hitunglaptop);
        // dd($speklaptop);
        // dd($speklaptop[0]['mt']);
        // dd($laptop);
        // dd($hitung);


        // $laptops_sewa = Penyewaan::where('id', $id)->first();

        return view('penyewaan.penyewaan-costumer')
            ->with('costumer', $costumer)
            ->with('hitung', $hitung)
            ->with('speklaptop', $speklaptop);
    }

    public function penyewaanselesai(string $idcostumer, $tglselesai)
    {
        // mencari laptop yang disewa oleh custumer
        $penyewaans = Penyewaan::where('costumer_id', $idcostumer)->get();
        $jumlahunitsewa = count($penyewaans) - 1;

        // mengambil semua id laptop yang disewa
        for ($i = 0; $i <= $jumlahunitsewa; $i++) {
            $id_laptop[] = $penyewaans[$i]->laptop_id;
        }
        $jumlahunit = count($id_laptop); // menghitung jumlah unit untuk perulangan

        // mengubah status laptop dari dipenyewaan kembali ke toko (stok penyewaan)
        $status_laptop = [
            'laptop_status_id' => 2
        ];
        // mengubah kembali status semua laptop yang sudah penyewaan
        for ($i = 0; $i < $jumlahunit; $i++) {
            Laptop::where('id', $id_laptop[$i])->update($status_laptop);
        }

        // menghapus data penyewaan pada tabel penyewaan yang sudah selesai berdasar id dan tgl selesai
        Penyewaan::where('costumer_id', $idcostumer)->where('tgl_selesai', $tglselesai)->delete();

        return redirect('/penyewaan');
    }
}
