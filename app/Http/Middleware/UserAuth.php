<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth;
class UserAuth
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
        return redirect('user/login');

        }

        if(Auth::user()->status == 'inactive'){
            Auth::logout();
            // return redirect('/');
        return redirect('user/login');
            
        }

         if(Auth::user()->is_admin ==1){
            Auth::logout();
      return  redirect()->route('login')->with('active','You are not user');
            
        }
        return $next($request);
    }
}
