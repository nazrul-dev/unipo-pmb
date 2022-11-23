<?php

namespace App\Http\Middleware;

use App\Models\Maba;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MabaTerbayar
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
        if (Auth::check() && Auth::user()->role == 'maba') {
            $x = Maba::where('email', auth()->user()->email)->first();
            if($x->terbayar == false){
                return $next($request);
            }else{
                return redirect('/dashboard');  
            }
            
        }
        return redirect('/dashboard');
    }
}
