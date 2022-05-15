<?php

namespace App\Http\Livewire\Messenger\Components;

use App\Models\Messenger\Thread;
use App\Models\User;
use Livewire\Component;

class SendMessageMessengerForm extends Component
{
    public $content;
    public User $recipient;

    public function send(): void
    {
        $thread = Thread::createOrFindThreadWithRecipient($this->recipient->id);

        $message = $thread->messages()->create([
            'content' => $this->content,
        ]);

        $message->createForSend($thread->id);
        $message->createForReceive($thread->id, $this->recipient->id);

        $this->content = '';
    }

    public function render()
    {
        return view('livewire.messenger.components.send-message-messenger-form');
    }
}
