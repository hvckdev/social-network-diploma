<div wire:poll.keep-alive>
    <x-card-layout>
        <x-slot name="title">
            {{ $thread->getRecipient($this->user->id)->information->first_name }}
            {{ $thread->getRecipient($this->user->id)->information->last_name  }}
            <span class="font-size-14 float-right text-muted">
                last seen {{ $thread->getRecipient($this->user->id)->information->visited_at->diffForHumans() }}
            </span>
        </x-slot>
        <div class="container overflow-y-hidden overflow-y-md-auto h-500" >
            <div class="h-auto">
                @foreach($this->chats() as $chat)
                    <div class="d-flex justify-content-{{ $chat['type'] === 1 ? 'start' : 'end' }}">
                        <div class="card">
                            <div class="card-title">
                                {{ $chat['type'] === 1
                                    ? $thread->getRecipient($this->user->id)->full_name
                                    : $chat->user->full_name }}
                            </div>
                            <hr>
                            <div class="card-text">{{ $this->getMessageContent($chat['message_id']) }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>

        <livewire:messenger.components.send-message-messenger-form :recipient="$thread->getRecipient($this->user->id)"/>
    </x-card-layout>
</div>
