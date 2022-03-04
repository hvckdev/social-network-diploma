<?php

namespace App\Http\Livewire\Messenger;

use App\Models\Messenger\Message;
use App\Models\Messenger\Thread;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread;
    public User $user;
    public $content;

    protected array $rules = [
        'content' => 'required'
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function getSenderName($userId)
    {
        return User::find($userId)->name;
    }

    public function getMessageContent($messageId)
    {
        return Message::find($messageId)->content;
    }

    public function chats(): Collection
    {
        return $this->thread->chats()
            ->where('user_id', '=', $this->user->id)
            ->get();
    }

    public function read(): void
    {
        $this->thread->read();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.messenger.show-thread');
    }
}
