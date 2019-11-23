<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdminUtama
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
        if(\Auth::user()->level != "Admin Utama"){
            abort(404);
        }
        return $next($request);
    }
}
