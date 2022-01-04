<?php

namespace App\Http\Controllers\Jetstream;

use App\Http\Requests\EditProfileInformationRequest;
use App\Http\Requests\EditProfileRequest;
use App\Models\User;
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

    public function editProfileInformation(EditProfileRequest $profileRequest, EditProfileInformationRequest $profileInformationRequest, User $user): \Illuminate\Http\RedirectResponse
    {
        $user->update($profileRequest->validated());
        $user->information()->update($profileInformationRequest->validated());

        return redirect()->route('profile.show');
    }
}
