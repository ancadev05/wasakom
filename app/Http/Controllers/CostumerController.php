<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function costumer()
    {
        $costumers = Costumer::get();
        return view('costumer.costumer')
            ->with('costumers', $costumers);
    }
    // buat costumer
    public function costumercreate()
    {
        return view('costumer.costumer-buat');
    }
    // costumer store
    public function costumerstore(Request $request)
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
    // edit costumer
    public function costumeredit(string $id)
    {
        $costumer = Costumer::where('id', $id)->first();

        return view('costumer.costumer-edit')
            ->with('costumer', $costumer);
    }
    // edit update
    public function costumerupdate(Request $request, string $id)
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
    // costumer delete
    public function costumerdelete(string $id)
    {
        costumer::where('id', $id)->delete();
        return redirect('/costumer');
    }
}
