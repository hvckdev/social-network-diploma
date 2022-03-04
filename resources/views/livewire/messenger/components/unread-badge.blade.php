<div wire:poll.keep-alive>
    @if(auth()->user()->getUnreadMessagesCount() > 0)
        <span class="ml-5 badge badge-danger badge-pill">
            {{ auth()->user()->getUnreadMessagesCount() }}
        </span>
    @endif
</div>
