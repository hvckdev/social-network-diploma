<div class="modal" id="send-message-modal-{{ $this->friendId }}" tabindex="-1" role="dialog" data-overlay-dismissal-disabled="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title">Send message to <img src="{{ $recipient->profile_photo_url }}" alt="" width="15" height="15"> {{ $recipient->name }}</h5>
            <form wire:submit.prevent="submit">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" wire:model.lazy="text"
                          placeholder="Hi! How are u?"></textarea>
            </form>
            <div class="text-right mt-20"> <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                <button class="btn mr-5" data-dismiss="modal" type="button">Close</button>
                <button class="btn btn-primary" type="submit" wire:click="send">Send</button>
            </div>
        </div>
    </div>
</div>

