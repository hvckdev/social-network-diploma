<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="form-group" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="form-group me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
				</x-jet-secondary-button>

				@if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" wire:click="deleteProfilePhoto">
                        <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="form-group" />
            </div>
        @endif

        <div class="w-md-75">
            <!-- Name -->
            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <!-- Email -->
            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
                <x-jet-input-error for="email" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

				{{ __('Save') }}
			</x-jet-button>
		</div>
    </x-slot>
</x-jet-form-section>
