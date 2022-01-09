@if(! $this->user->isFriendWith($this->recipient))
    @if(! $this->user->hasSentFriendRequestTo($this->recipient) && ! $this->user->hasFriendRequestFrom($this->recipient))
        <button type="submit" class="btn btn-primary" wire:click="send">Send friend request</button>
    @elseif($this->user->hasFriendRequestFrom($this->recipient))
        <button type="submit" class="btn" wire:click="accept">Accept friend request</button>
        <button type="submit" class="btn btn-danger" wire:click="reject">Reject friend request</button>
    @else
        <button type="submit" class="btn btn-danger" wire:click="delete">Cancel friend request</button>
    @endif
@else
    <button type="submit" class="btn" wire:click="delete">Delete a friend</button>
@endif
