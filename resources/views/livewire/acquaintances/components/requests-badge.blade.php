<div wire:poll.visible>
    @if(auth()->user()->getFriendRequests()->first() !== null)
        <span class="ml-5 badge badge-danger badge-pill">
                        {{ auth()->user()->getFriendRequests()->count() }}
                    </span>
    @endif
</div>
