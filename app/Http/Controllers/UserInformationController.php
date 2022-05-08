<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserInformationRequest;
use App\Models\UserInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('auth.provide-information');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserInformationRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserInformationRequest $request): RedirectResponse
    {
        auth()->user()->information()->create($request->validated());

        return redirect()->route('users.show', auth()->user());
    }
}
