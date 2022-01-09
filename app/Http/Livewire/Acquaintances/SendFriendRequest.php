<?php

namespace App\Http\Livewire\Acquaintances;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class SendFriendRequest extends Component
{
    public $user;
    public $recipient;

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

    public function render()
    {
        return view('livewire.acquaintances.send-friend-request');
    }
}
