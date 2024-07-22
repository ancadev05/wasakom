<?php

namespace App\Http\Controllers;

use App\Models\LevelAkun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // menampilkan daftar user
    public function user()
    {
        $users = User::get();

        return view('users.user', compact('users'));
    }
    // menampilkan profil untuk setiap akun user
    public function profil()
    {
        $user = Auth::user();
        return view('users.user-profile', compact('user'));
    }
    // buat akun user
    public function usercreate()
    {
        $level_akun = LevelAkun::get();
        return view('users.user-create', compact('level_akun'));
    }
    // store user
    public function userstore(Request $request)
    {
        $user = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'sandi' => $request->password,
            'level_akun_id' => $request->level_akun_id,
            'no_wa' => date('mdhis'),
        ];

        // dd($user);

        User::create($user);

        return redirect('/user');
    }
    // hapus user
    public function userdelete(string $id)
    {
        User::where('id', $id)->delete();

        return redirect('/user');
    }

}
