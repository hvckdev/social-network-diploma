<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfilePhoto extends Component
{
    use WithFileUploads;

    public $photo;
    public User $user;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.profile.edit-profile-photo');
    }

    public function store(): void
    {
        $this->validate([
            'photo' => 'image|max:1024'
        ]);

        $this->user->updateProfilePhoto($this->photo);
    }
}
