@if(! $this->user->isFriendWith($this->recipient))
    @if($this->user->canBefriend($this->recipient))
        <button type="submit" class="btn btn-primary btn-sm" wire:click="send">Send friend request</button>
    @elseif($this->user->hasFriendRequestFrom($this->recipient))
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-sm" wire:click="accept">Accept friend request</button>
            <button type="submit" class="btn btn-danger btn-sm" wire:click="reject">Reject friend request</button>
        </div>
    @else
        <button type="submit" class="btn btn-danger btn-sm" wire:click="delete">Cancel friend request</button>
    @endif
@else
    <button type="submit" class="btn btn-sm btn-danger" wire:click="delete">Delete a friend</button>
@endif
