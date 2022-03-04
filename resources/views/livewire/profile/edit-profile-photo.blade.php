<div>
    <form wire:submit.prevent="store">
        <div class="form-group justify-content-center">
            <img src="{{ auth()->user()->profile_photo_url }}" alt="">
            <div class="custom-file">
                <input type="file" accept=".jpg,.png" id="profilePhotoInput" wire:model="photo">
                <label for="profilePhotoInput">Choose photo</label>
            </div>

        </div>
        <div class="text-right"> <!-- text-right = text-align: right -->
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>
</div>
