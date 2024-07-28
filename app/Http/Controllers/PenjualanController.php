<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function laptopterjual()
    {
        $laptops = Laptop::where('laptop_status_id', 6)->orderBy('id', 'desc')->get();

        return view('penjualan.laptop-terjual')
            ->with('laptops', $laptops);
    }

    public function laptopjual(string $id)
    {
        
    }
}
