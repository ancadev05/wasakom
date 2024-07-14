<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index(){
        return view('penyewaan.index');
    }

    public function dalampenyewaan()
    {
        $laptop = Laptop::where('laptop_status_id', 5)->get();
        
        return view('penyewaan.dalam-penyewaan')
            ->with('laptop', $laptop);
    }
}
