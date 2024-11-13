<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if ($request->level == 'user') {
    //         return redirect()->route('welcome')
    //             ->withError('Anda bukan Admin');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user() && auth()->user()->level !== 'admin'){
            return redirect('/dashboard')->with('error','Anda Tidak memiliki akses ke halaman admin');
        }
        return $next($request);
    }
}
