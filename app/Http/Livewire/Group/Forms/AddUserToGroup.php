<?php

namespace App\Http\Livewire\Group\Forms;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddUserToGroup extends Component
{
    public User $user;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.group.forms.add-user-to-group');
    }
}
