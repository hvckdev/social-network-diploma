<?php

namespace App\Http\Controllers\Jetstream;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserProfileController extends \Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController
{
    /**
     * Show the user profile screen.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
