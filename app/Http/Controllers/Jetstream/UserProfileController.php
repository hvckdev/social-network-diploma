<?php

namespace App\Http\Controllers\Jetstream;

use App\Http\Requests\EditProfileInformationRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserProfileController extends \Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController
{
    /**
     * Show the user profile screen.
     *
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    /**
     * Update user profile information.
     *
     * @param EditProfileRequest $profileRequest
     * @param EditProfileInformationRequest $profileInformationRequest
     * @return RedirectResponse
     */
    public function updateUserProfileInformation(EditProfileRequest $profileRequest, EditProfileInformationRequest $profileInformationRequest): RedirectResponse
    {
        Auth::user()->update($profileRequest->validated());
        Auth::user()->information()->update($profileInformationRequest->validated());

        return redirect()->route('profile.show');
    }

    /**
     * Update user's password.
     *
     * @param UpdateUserPasswordRequest $request
     * @return RedirectResponse
     */
    public function updateUserPassword(UpdateUserPasswordRequest $request): RedirectResponse
    {
        Auth::user()->update([
            'password' => Hash::make($request->validated()['password']),
        ]);

        return redirect()->route('profile.show');
    }
}
