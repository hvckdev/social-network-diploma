<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            Registration
        </x-slot>

        <x-jet-validation-errors class=form-group/>

            <div class="card-body">
                <form method="POST" action="{{ route('user-info.store') }}">
                    @csrf
                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('First Name') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                         placeholder="First name"
                                         type="text" name="first_name"
                                         :value="old('first_name')" required autofocus autocomplete="first_name"/>
                            <x-jet-input-error for="first_name"></x-jet-input-error>
                        </div>
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Middle Name') }}"/>

                            <x-jet-input class="{{ $errors->has('middle_name') ? 'is-invalid' : '' }}"
                                         placeholder="Middle name"
                                         type="text" name="middle_name"
                                         :value="old('middle_name')" autofocus autocomplete="middle_name"/>
                            <x-jet-input-error for="middle_name"></x-jet-input-error>
                        </div>
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Last Name') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                         placeholder="Last name"
                                         type="text" name="last_name"
                                         :value="old('last_name')" required autofocus autocomplete="last_name"/>
                            <x-jet-input-error for="last_name"></x-jet-input-error>
                        </div>
                    </div>

                    <div class="form-row row-eq-spacing">
                        <div class="col">
                            <x-jet-label value="{{ __('Date of birth') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('birthday') ? 'is-invalid' : '' }}" placeholder="Date of birth"
                                         type="date" name="birthday"
                                         :value="old('birthday')" required autofocus autocomplete="birthday"/>
                            <x-jet-input-error for="birthday"></x-jet-input-error>
                        </div>
                    </div>


                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Country') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('contry') ? 'is-invalid' : '' }}" placeholder="Country"
                                         type="text" name="country"
                                         :value="old('country')" required autofocus autocomplete="country"/>
                            <x-jet-input-error for="country"></x-jet-input-error>
                        </div>
                        <div class="col-sm">
                            <x-jet-label value="{{ __('City') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City"
                                         type="text" name="city"
                                         :value="old('city')" required autofocus autocomplete="city"/>
                            <x-jet-input-error for="city"></x-jet-input-error>
                        </div>
                    </div>

                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Website') }}"/>

                            <x-jet-input class="{{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website"
                                         type="text" name="website"
                                         :value="old('website')" autofocus autocomplete="website"/>
                            <x-jet-input-error for="website"></x-jet-input-error>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <x-jet-button>
                                {{ __('Register') }}
                            </x-jet-button>

                        </div>
                    </div>
                </form>
            </div>
    </x-jet-authentication-card>
</x-guest-layout>
