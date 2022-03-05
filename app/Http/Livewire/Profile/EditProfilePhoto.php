<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfilePhoto extends Component
{
    use WithFileUploads;

    /**
     * @var mixed
     */
    public $photo;

    /**
     * @var array
     */
    public array $state = [];

    /**
     * @var User
     */
    public User $user;

    /**
     * Prepare the component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.profile.edit-profile-photo');
    }

    public function store(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('profile.show');
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }
}
