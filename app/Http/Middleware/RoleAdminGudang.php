<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdminGudang
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
        if(\Auth::user()->level != "Admin Gudang"){
            abort(404);
        }
        return $next($request);
    }
}
