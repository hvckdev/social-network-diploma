<?php

namespace App\Http\Livewire\Messenger\Components;

use App\Models\Messenger\Thread;
use App\Models\User;
use Livewire\Component;

class SendMessageMessengerForm extends Component
{
    public $content;
    public User $recipient;

    protected $rules = [
        'content' => 'required|string',
    ];

    public function send(): void
    {
        $this->validate();

        $thread = Thread::createOrFindThreadWithRecipient($this->recipient->id);

        $message = $thread->messages()->create([
            'content' => $this->content,
        ]);

        $message->createForSend($thread->id);
        $message->createForReceive($thread->id, $this->recipient->id);
    }

    public function render()
    {
        return view('livewire.messenger.components.send-message-messenger-form');
    }
}
