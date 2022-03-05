<div>
    <form wire:submit.prevent="store">
        <div class="form-group justify-content-center">
            <div class="custom-file">
                <input type="file" id="profilePhotoInput" wire:model="photo" x-ref="photo">
                <label for="profilePhotoInput">Choose photo</label>
            </div>

            @if(!$photo)
                <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
            @else
                <img src="{{ $photo->temporaryUrl() }}" class="rounded-circle" width="80px" height="80px">
            @endif
        </div>
        @error('photo') <span class="error">{{ $message }}</span> @enderror
        <div class="text-right"> <!-- text-right = text-align: right -->
            <button class="btn btn-primary" type="submit">
                <div class="spinner-border-sm" wire:loading></div>
                Update photo
            </button>
        </div>
    </form>
</div>
