<?php

namespace App\Http\Livewire\Messenger;

use App\Models\Messenger\Thread;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SendMessageModal extends Component
{
    public User $user;
    public User $recipient;
    public $text;
    public int $friendId;

    protected array $rules = [
        'text' => 'required'
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = auth()->user();
    }

    public function send(): void
    {
        $thread = Thread::createOrFindThreadWithRecipient($this->recipient->id);

        $message = $thread->messages()->create([
            'content' => $this->text
        ]);

        $message->createForSend($thread->id);
        $message->createForReceive($thread->id, $this->recipient->id);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.messenger.send-message-modal');
    }
}
