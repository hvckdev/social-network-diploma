<?php

namespace App\Http\Middleware;

use Carbon\Traits\Date;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateUserVisitDate
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
        if($request->user()->is_full_registered ?? false)
            $request->user()->information()->update(['visited_at' => \Illuminate\Support\Facades\Date::now()]);

        return $next($request);
    }
}
