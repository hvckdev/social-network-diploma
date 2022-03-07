<?php

namespace App\Http\Livewire\Group\Forms;

use App\Models\Group;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DeleteUserFromGroup extends Component
{
    public Group $group;
    public Collection $users;

    public $usersToDelete;

    public function render(): Factory|View|Application
    {
        return view('livewire.group.forms.delete-user-from-group');
    }

    public function mount(): void
    {
        $this->users = User::inGroup($this->group->id);
    }

    public function delete()
    {
        foreach ($this->usersToDelete as $user) {
            User::find($user)->information->update(['group_id' => null]);
        }

        return $this->redirectRoute('groups.edit', $this->group->id);
    }
}
