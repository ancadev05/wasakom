<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanTeknisiController extends Controller
{
    public function laporanteknisiharian()
    {
        return view('servisan.servisan-laporan-harian');
    }
}
