<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;
use Auth;

class Applicant
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
        if(auth()->user()->user_type == 'applicant'){
         return $next($request);
         }
         else{
            Session::put('error', 'You have no any permission to enter Applicant panel. Please login as Applicant');

            return redirect('home');
         }
     }
     else {
        return redirect('login');
     }
    }
}
