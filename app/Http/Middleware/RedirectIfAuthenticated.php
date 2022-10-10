<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
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
       if (Auth::guard($guard)->check()) {
        	$user_id= Auth::user()->id;
        	echo $user_id; die;
        	$adminDetail= User::where('id', $user_id)->first();
        	if($adminDetail->admin == 1){
        	}
        	//put details in session
            Session::put('adminDetail', $adminDetail);

            return redirect('/merchant_dashboard');
        }else{
            return redirect('/merchant')->with('error_message', 'kindly Login.');
        }

        return $next($request);
    }
}
