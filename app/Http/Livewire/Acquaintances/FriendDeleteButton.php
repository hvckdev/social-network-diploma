<?php

namespace App\Http\Livewire\Acquaintances;

use Livewire\Component;
use Livewire\Redirector;

class FriendDeleteButton extends Component
{
    public $user;
    public $friend;

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

    public function render()
    {
        return view('livewire.acquaintances.friend-delete-button');
    }
}
