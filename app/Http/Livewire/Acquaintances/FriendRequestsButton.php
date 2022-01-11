<?php

namespace App\Http\Livewire\Acquaintances;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class FriendRequestsButton extends Component
{
    public User $user;
    public User $sender;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function accept(): Redirector
    {
        $this->user->acceptFriendRequest($this->sender);

        session()->flash('message', 'You have successfully added friend '.$this->sender->name.'.');

        return redirect()->to(route('friends.index'));
    }

    public function reject(): Redirector
    {
        $this->user->denyFriendRequest($this->sender);

        session()->flash('message', 'You have successfully denied friend request from '.$this->sender->name.'.');

        return redirect()->to(route('friends.index'));
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.friend-requests-button');
    }
}
