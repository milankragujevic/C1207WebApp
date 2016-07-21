<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $user=$request->user();
        if (isset($user)){
            if ( $request->user()->role!=='admin'){
            abort(401);
            }
        }else{
            abort(401);
        }

        return $next($request);
    }
}
