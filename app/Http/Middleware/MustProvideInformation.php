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
     * @param Closure $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (($request->user()->is_full_registered ?? true) === false)
            if ($request->routeIs('user-info.create', 'user-info.store', 'logout') === false)
                return redirect()->route('user-info.create');
            else
                return $next($request);

        elseif (auth()->user() && $request->routeIs('user-info.create', 'user-info.store'))
            return redirect()->route('profile.show');


        return $next($request);
    }
}
