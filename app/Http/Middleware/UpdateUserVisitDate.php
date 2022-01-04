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
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(! empty($request->user()->information[0]->visited_at))
            $request->user()->information[0]->update(['visited_at' => \Illuminate\Support\Facades\Date::now()]);

        return $next($request);
    }
}
