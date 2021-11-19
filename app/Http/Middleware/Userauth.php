<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class Userauth
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
        $id = Session::get('user_id');
        if(isset($id))
        {
            

        }else{
            $request->session()->flash('error',"You will need to login");
            return redirect('/login');

        }
        return $next($request);
    }
}
