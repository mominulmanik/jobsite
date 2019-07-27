<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;
use Auth;

class Company
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          if(Auth::check()){
        if(auth()->user()->user_type == 'company'){
         return $next($request);
         }
         else{
            Session::put('error', 'You have no any permission to enter Company panel. Please login as Company');

            return redirect('home');
         }
         
     }
     else {
        return redirect('login');
     }
    }
}
