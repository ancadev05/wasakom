<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index() 
    {
        $laptop = Laptop::orderBy('id', 'desc')->get();

        return view('display.laptop')->with('laptop', $laptop);
    }

    public function laptopdetail()
    {
        return view('display.laptop-detail');
    }
}
