<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
// use Request;

class AdminAuth
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
         if(!Auth::guard('web')->check()){
            // dd("hi");
            // return redirect('/');
        return redirect('admin/login');
        }

         // dd(Auth::user()->is_admin);

        if(Auth::user()->status == 'inactive'){
            Auth::logout();
            // return redirect('/');
        return redirect('admin/login');
            
        } 
         if(Auth::user()->is_admin ==0){
            Auth::logout();
            // return redirect('/');
        // return redirect('admin/login');
      return  redirect()->route('login')->with('active','You are not admin');
            
        }
        return $next($request);
    }
}
