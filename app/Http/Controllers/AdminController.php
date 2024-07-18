<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $laptops_display = Laptop::where('laptop_status_id', 'display')->get();
        $laptops_penyewaan = Laptop::where('laptop_status_id', 'penyewaan')->get();
        
        return view('dahsboard.index');
    }
}
