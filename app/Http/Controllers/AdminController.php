<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $laptops_display = Laptop::where('laptop_status_id', 'display')->get();
        $laptops_penyewaan = Laptop::where('laptop_status_id', 'penyewaan')->get();

        $laptops = Laptop::select('laptop_tipe_id', 'laptop_merek_id', DB::raw('count(*) as total'))
            ->groupBy('laptop_tipe_id', 'laptop_merek_id')
            ->get();

            // $data = Laptop::all();
        
            // dd($data);
        return view('dashboard.index')->with('laptops', $laptops);
    }
}
