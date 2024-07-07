<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index(){
        return view('penyewaan.index');
    }
}
