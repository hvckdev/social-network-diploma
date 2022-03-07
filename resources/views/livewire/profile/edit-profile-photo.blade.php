<div>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            @if(!$photo)
                <img src="{{ $this->user->profile_photo_url }}" height="120px" width="120px">
            @else
                <img src="{{ $this->photo->temporaryUrl() }}" width="120px" height="120px">
            @endif
        </div>

        <div class="form-group justify-content-center">
            <div class="custom-file">
                <input type="file" id="profilePhotoInput" wire:model="photo" x-ref="photo">
                <label for="profilePhotoInput">Choose photo</label>
            </div>
        </div>
        @error('photo') <span class="invalid-feedback">{{ $message }}</span> @enderror
        <div class="text-right"> <!-- text-right = text-align: right -->
            <button class="btn btn-primary" type="submit">
                <div class="spinner-border-sm" wire:loading></div>
                Update photo
            </button>
        </div>
    </form>
</div>
