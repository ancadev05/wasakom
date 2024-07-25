<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\LevelAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $laptops_display = Laptop::where('laptop_status_id', 'display')->get();
        $laptops_penyewaan = Laptop::where('laptop_status_id', 'penyewaan')->get();

        $user = Auth::user();
        $level = LevelAkun::get();

        $laptops = Laptop::whereNotIn('laptop_status_id', [6])->select('laptop_tipe_id', 'laptop_merek_id', DB::raw('count(*) as total'))
            ->groupBy('laptop_tipe_id', 'laptop_merek_id')
            ->get();

        return view('dashboard.index')
            ->with('laptops', $laptops);
    }
    // menampilkan list laptop dengan tipe tertentu
    public function laptoptipelist(string $id, $tipe)
    {
        $laptops = Laptop::where('laptop_tipe_id', $id)->whereNotIn('laptop_status_id', [6])->get();

        return view('laptop.laptop-list-tipe')
            ->with('tipe', $tipe)
            ->with('laptops', $laptops);
    }
}
