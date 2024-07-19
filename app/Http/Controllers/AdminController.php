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

        $laptops = Laptop::select('id_laptop_tipe', DB::raw('count(*) as total'))
            ->groupBy('id_laptop_tipe')
            ->get();
        
        return view('dahsboard.index')->with('laptops', $laptops);
    }
}
