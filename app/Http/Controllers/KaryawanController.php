<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::get();

        return view('karyawan.index', compact(
            'karyawans'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.karyawan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $karyawan = [
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ];

        Karyawan::create($karyawan);

        return redirect('/karyawan');
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
        $karyawan = Karyawan::where('id', $id)->first();

        return view('karyawan.karyawan-edit', compact(
            'karyawan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $karyawan = [
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ];

        Karyawan::where('id', $id)->update($karyawan);

        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::where('id', $id)->delete();
        return redirect('/karyawan');
    }
}
