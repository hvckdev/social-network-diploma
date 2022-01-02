<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            Registration
        </x-slot>

        <x-jet-validation-errors class=form-group/>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Nickname') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                         placeholder="Nickname"
                                         type="text" name="name"
                                         :value="old('name')" required autofocus autocomplete="name"/>
                            <x-jet-input-error for="name"></x-jet-input-error>
                        </div>
                    </div>
                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Email') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email"
                                         type="email" name="email"
                                         :value="old('email')" required autofocus autocomplete="email"/>
                            <x-jet-input-error for="email"></x-jet-input-error>
                        </div>
                    </div>

                    <div class="form-row row-eq-spacing-sm">
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Password') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                         placeholder="Password"
                                         type="password" name="password"
                                         :value="old('password')" required autofocus autocomplete="password"/>
                            <x-jet-input-error for="password"></x-jet-input-error>
                        </div>
                        <div class="col-sm">
                            <x-jet-label value="{{ __('Confirm password') }}" class="required"/>

                            <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                         placeholder="Confirm password"
                                         type="password" name="password_confirmation"
                                         :value="old('password')" required autofocus autocomplete="password"/>
                            <x-jet-input-error for="name"></x-jet-input-error>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <x-jet-checkbox id="terms" name="terms"/>
                                <label class="custom-control-label" for="terms">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                </label>
                            </div>
                        </div>
                    @endif

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
