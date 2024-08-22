<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumers = Costumer::orderBy('id', 'desc')->get();
        return view('costumer.costumer')
            ->with('costumers', $costumers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('costumer.costumer-buat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_wa' => 'required',
        ]);

        $costumer = [
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'foto_ktp' => 'ok',
        ];

        Costumer::create($costumer);

        return redirect('/costumer');
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
        $costumer = Costumer::where('id', $id)->first();

        return view('costumer.costumer-edit')
            ->with('costumer', $costumer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $costumer = [
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'foto_ktp' => 'ok',
        ];

        Costumer::where('id', $id)->update($costumer);

        return redirect('/costumer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        costumer::where('id', $id)->delete();
        return redirect('/costumer');
    }
}
