<?php

namespace App\Http\Livewire\Acquaintances;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SendFriendRequestButton extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.send-friend-request-button');
    }
}
