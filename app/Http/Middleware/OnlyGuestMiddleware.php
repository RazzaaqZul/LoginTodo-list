<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // jika ada sessionnya, langsung di direct ke "/"
        if($request->session()->exists("user")){
            // Jika member/sudah login
            return redirect("/");
        } else {
            // Jika belum, teruskan ke controller
            return $next($request);
        }
        
    }
}
