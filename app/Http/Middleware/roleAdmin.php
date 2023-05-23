<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleAdmin
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
        if(Auth::check()&& Auth::user()->level=="admin"){
        return $next($request);
        }
        // jika tidak punnya akses
        $mess = [
            "type" => "danger",
            "text" => "Maaf anda tidak punya akses",
        ];
        return redirect('/admin')->with($mess);
    }
}
