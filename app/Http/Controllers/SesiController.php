<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // validasi username dan password
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        // menampung isi username dan password
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        //  proses pengecekan jika email dan password terdaftar
        if (Auth::attempt($infologin)) {
            // mengalahkan kehalaman sesuai level username
            return redirect('/dashboard');
            // if (Auth::user()->level_akun_id == 'official') {
            //     return redirect('/dashboard');
            // } elseif (Auth::user()->level_akun_id == 'admin-kejurnas') {
            //     return redirect('/admin-kejurnas');
            // }
        } else {
            return redirect('/')->withErrors('username dan password tidak sesuai')->withInput();
        }
    }

    // function logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
