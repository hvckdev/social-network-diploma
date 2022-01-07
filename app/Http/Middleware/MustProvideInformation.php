<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustProvideInformation
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && ! $request->user()->is_full_registered)
            if ($request->routeIs('user-info.create', 'user-info.store') === false)
                return redirect()->route('user-info.create');
            else
                return $next($request);

        if(auth()->user() && $request->routeIs('user-info.create', 'user-info.store'))
            return redirect()->route('profile.show');

        return $next($request);
    }
}
