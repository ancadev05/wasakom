<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level_akun_id): Response
    {
        // route yang hanya boleh diakses oleh super user
        // if (Auth::user()->level == $level) {
        //     return $next($request);
        // }
        
        // melanjutkan request jika level akun 1
        if (Auth::user()->level_akun_id == $level_akun_id) {
            return $next($request);
            // return redirect('/user');
        } else {
            // redirect kehalaman utama jika rote yang diakses punya level 1
            return redirect('/');
        }
        
        
    }
}
