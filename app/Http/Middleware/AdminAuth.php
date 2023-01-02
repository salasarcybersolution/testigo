<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Session;
// use App;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {    
        
        $user = Auth::user();
        $user_id      = $user->id; 
        $user_type_id = $user->user_type_id;

        // $user_id      = auth()->user()->id;; 
        // $user_type_id = auth()->user()->user_type_id;
        
        if(empty($user_id)){
            Session::flash('msg', "Your session has expired"); 
            return redirect('/admin');  
        }else if($user_type_id == '1'){
            return $next($request);     
        }else{
            Session::flash('msg', "You don't have access this section"); 
            return redirect('/');
        }
         
    }
}
