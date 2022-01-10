<?php

namespace App\Http\Livewire\Acquaintances;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Redirector;

class FriendDeleteButton extends Component
{
    public User $user;
    public User $friend;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function delete(): Redirector
    {
        $this->user->unfriend($this->friend);

        return redirect()->to(route('friends.index'));
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.friend-delete-button');
    }
}
