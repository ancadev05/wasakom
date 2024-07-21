<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // protected $user= Auth::user();
    public function profil()
    {
        $user = Auth::user();
        return view('users.user-profile', compact('user'));
    }
}
