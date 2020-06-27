<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPortalServiceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $exp = explode(".", $request->route()->getName());

        $services = Auth::user()->role->service;
        $all = [];
        $services = $services->toArray();
//dd($services[0]['title']);
        foreach ($services as $service) {

            array_push($all, $service['title']);
        }
        if (!in_array($exp[0], $all)) {
            abort(404);
        }
        return $next($request);
    }
}
