<x-card-layout>
    <x-slot name="title">Messages</x-slot>
    <div class="content">
        <div wire:poll.keep-alive>
            @foreach($this->threads as $thread)
                <div class="m-5 card" >
                    <a class="col" href="{{ route('threads.show', $thread->id) }}">
                        <strong>
                            {{ $thread->getRecipient($this->user->id)->information->first_name }}
                            {{ $thread->getRecipient($this->user->id)->information->last_name  }}
                        </strong>
                        <br>
                        {{ $thread->getLatestMessage()->content }}
                        <div class="float-right badge badge-pill"> {{ $thread->unread_messages_count }} </div>
                        <hr/>
                        <span class="float-right">Go to conversation</span>
                    </a>

                    <br>
                    <span
                        class="float-right">{{ $thread->getLatestMessage()->created_at->format('d-m-y | H:i') }}</span>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
</x-card-layout>