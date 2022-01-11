<?php

namespace App\Http\Livewire\Acquaintances\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RequestsBadge extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.acquaintances.components.requests-badge');
    }
}
