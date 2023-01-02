<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
use App;
class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {   
                
        $user_id      = session('id'); 
        $user_type_id = session('user_type_id');
        
        if(empty($user_id)){
             Session::flash('msg', "Your session has expired");  
             return redirect('/login');  
        }else if($user_type_id == '2'){
             return $next($request);     
        }else{
             Session::flash('msg', "You don't have access this section"); 
             return redirect('/');
        }
         
    }
}
