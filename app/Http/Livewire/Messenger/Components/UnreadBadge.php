<?php

namespace App\Http\Livewire\Messenger\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UnreadBadge extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.messenger.components.unread-badge');
    }
}
