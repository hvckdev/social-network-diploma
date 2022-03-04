<form wire:submit.prevent="send">
    <label for="message">Send message</label>
    <div class="row">
        <input wire:model.lazy="content" type="text" id="message" wire:model.lazy="content" placeholder="Hello!" class="col form-control mr-5">
        <button class="col-sm-1 btn" type="submit">Send</button>
    </div>
</form>
