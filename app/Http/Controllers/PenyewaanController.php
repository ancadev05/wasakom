<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index(){
        $laptop = Laptop::where('laptop_status_id', 5)->get();
        
        return view('penyewaan.penyewaan')
            ->with('laptop', $laptop);
    }

    public function dalampenyewaan()
    {
        $laptop = Laptop::where('laptop_status_id', 5)->get();
        
        return view('penyewaan.penyewaan')
            ->with('laptop', $laptop);
    }

    public function penyewaanbuat()
    {
        $laptops = Laptop::where('laptop_status_id', 2)
            ->where('laptop_kondisi_id', 1)->get();

        return view('development')
        ->with('laptops', $laptops);
    }
}
