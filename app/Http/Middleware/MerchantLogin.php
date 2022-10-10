<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
class MerchantLogin
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
        if (empty(Session::has('merchantSession'))) {
            return redirect('/merchant');
        }else{
            $user_id= Auth::user()->id;
            //echo $user_id; die;
            $adminDetail= User::where('id', $user_id)->first();
            //put details in session
            Session::put('adminDetail', $adminDetail);
           //get the current url
            $currentPath = Route::getFacadeRoot()->current()->uri();
            if($currentPath == 'merchant/dashboard' && $adminDetail->admin == 0){
                return redirect('/merchant/pickup');
            }
            if($currentPath == 'merchant/view_merchant' && $adminDetail->admin == 0){
                return redirect('/merchant/pickup');
            }
        }
        return $next($request);
    }
}
