<?php

namespace App\Http\Livewire\Messenger;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Livewire\Component;

class MessagesList extends Component
{
    public User $user;
    public Collection $threads;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
        $this->threads = $this->user->threads()->get();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.messenger.messages-list');
    }
}
