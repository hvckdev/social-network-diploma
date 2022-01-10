<?php

namespace App\Http\Livewire\Acquaintances;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class ProfileFriendButton extends Component
{
    public User $user;
    public User $recipient;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function delete(): void
    {
        $this->user->unfriend($this->recipient);
    }

    public function send(): void
    {
        $this->user->befriend($this->recipient);
    }

    public function accept(): Redirector
    {
        $this->user->acceptFriendRequest($this->recipient);

        return redirect()->to(route('users.show', $this->recipient->id));
    }

    public function reject(): void
    {
        $this->user->denyFriendRequest($this->recipient);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.profile-friend-button');
    }
}
