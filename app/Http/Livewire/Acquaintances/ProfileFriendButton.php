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

        session()->flash('message', 'You have successfully deleted friend ' . $this->recipient->name . '.');
    }

    public function send(): void
    {
        if ($this->user->canBefriend($this->recipient)) {
            $this->user->befriend($this->recipient);

            session()->flash('message', 'Friend request has been sent to ' . $this->recipient->name . '.');
        }
        else {
            $this->addError('friends', 'Add friend error!');
        }

    }

    public function accept(): void
    {
        $this->user->acceptFriendRequest($this->recipient);

        session()->flash('message', 'You have successfully added friend ' . $this->recipient->name . '.');
    }

    public function reject(): void
    {
        $this->user->denyFriendRequest($this->recipient);

        session()->flash('message', 'You have successfully denied friend request from ' . $this->recipient->name . '.');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.profile-friend-button');
    }
}
