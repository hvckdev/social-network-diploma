<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustProvideInformation
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        dd($request->user()->information->first_name);
        if (auth()->user() && empty($request->user()->information->first_name))
            if ($request->routeIs('user-info.create', 'user-info.store') === false)
                return redirect()->route('user-info.create');
            else
                return $next($request);

        if(auth()->user() && $request->routeIs('user-info.create', 'user-info.store'))
            return redirect()->route('profile.show');

        return $next($request);
    }
}
