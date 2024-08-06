<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\LaptopMerek;
use App\Models\Servisan;
use Illuminate\Http\Request;

class ServisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('servisan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $costumers = Costumer::get();
        $laptop_merek = LaptopMerek::get();

        return view ('servisan.servisan-create', compact(
            'costumers',
            'laptop_merek'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // cetak dan lihat nota servisan
    public function servisannota()
    {
        return view('servisan.servisan-nota');
    }


    // daftar servisan yang sudah dikerjakan teknisi
    public function servisanteknisi()
    {
        return view('servisan.servisan-teknisi');
    }

    // buat servisan yang akan dikerjakan teknisi
    public function servisanteknisicreate()
    {
        // $servisan = Servisan::get();
        $costumer = Costumer::get();
        $servisan = 1;


        return view('servisan.servisan-teknisi-create', compact(
            'costumer',
            'servisan'
        ));
    }

    // mengedit untuk status servisan yang sudah dikerjakan
    public function servisanteknisiedit(string $id)
    {
        $status = [
            'status' => ['Selesai', 'Proses', 'Oper Vendor', 'Cancel']
        ];

        return view('servisan.servisan-teknisi-edit', compact(
            'status'
        ));
    }

    // function tambahan
    public function servisanSelesai(){
        // return "halo";
        return view('servisan.servisan-selesai');
    }
}
