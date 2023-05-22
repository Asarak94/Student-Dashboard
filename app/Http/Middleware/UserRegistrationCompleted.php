<?php

namespace App\Http\Middleware;

use Closure;

class UserRegistrationCompleted
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
        if ($request->user()!=null && $request->user()->is_registration_completed != 0) {

            return $next($request);

        }elseif ($request->user()!=null && $request->user()->is_registration_completed == 0){
            if($request->route()->action["as"]!='restaurant_owner.create'){
                return redirect()->route('restaurant_owner.create');
            }else{
                /*$userControler = new \App\Http\Controllers\UserController();
                return  Response($userControler->create());*/
                return redirect()->route('restaurant_owner.create');
            }


        }else{

            return redirect()->route('index');
        }
    }
}
