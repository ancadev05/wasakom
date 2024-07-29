<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index() 
    {
        $laptop = Laptop::where('laptop_status_id', 1)->where('laptop_kondisi_id', 1)->orderBy('id', 'asc')->get();

        return view('display.laptop')->with('laptop', $laptop);
    }

    public function laptopdetail(string $id)
    {
        $laptop = Laptop::where('id', $id)->first();

        return view('display.laptop-detail')
            ->with('laptop', $laptop);
    }
}
