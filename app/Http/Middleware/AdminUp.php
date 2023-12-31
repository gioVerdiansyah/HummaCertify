<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\DaftarPesertaController;

class AdminUp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return to_route('home');
        }

        if (Auth::user()->email != "hummacertify@gmail.com") {
            return abort(403, 'Anda tidak bisa mengakses halaman ini!');
        }

        return $next($request);
    }
}
