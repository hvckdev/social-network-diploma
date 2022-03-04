<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit profile photo</x-slot>
        <livewire:profile.edit-profile-photo />
    </x-card-layout>
    <x-card-layout>
        <x-slot name="title">Edit Profile Information</x-slot>
        <x-jet-validation-errors class="mb-3 rounded-0"/>
        <form action="{{ route('update-user-information') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Nickname</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                       placeholder="Nickname"
                       required="required">
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="email" class="required">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <!-- Checkbox with empty label -->
                                <div class="custom-checkbox" data-toggle="tooltip"
                                     data-title="This checkbox does email public.">
                                    <x-forms.checkbox id="show-email"
                                                      name="show_email"
                                                      :value="$user->information->show_email"
                                    />
                                    <label for="show-email" class="blank"></label>
                                </div>
                            </div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                               placeholder="Email"
                               required="required">
                    </div>
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="first-name" class="required">First name</label>
                    <input type="text" class="form-control" id="first-name" name="first_name"
                           value="{{ $user->information->first_name }}" placeholder="First name"
                           required="required">
                </div>
                <div class="col-sm">
                    <label for="middle-name">Middle name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <!-- Checkbox with empty label -->
                                <div class="custom-checkbox" data-toggle="tooltip"
                                     data-title="This checkbox does middle name public.">
                                    <x-forms.checkbox id="show-middle-name"
                                                      name="show_middle_name"
                                                      :value="$user->information->show_middle_name"
                                    />
                                    <label for="show-middle-name" class="blank"></label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="middle-name" name="middle_name"
                               value="{{ $user->information->middle_name }}" placeholder="Middle name">
                    </div>
                </div>
                <div class="col-sm">
                    <label for="last-name" class="required">Last name</label>
                    <input type="text" class="form-control" id="last-name" name="last_name"
                           value="{{ $user->information->last_name }}" placeholder="Last name"
                           required="required">
                </div>
            </div>

            <!-- Second row container -->
            <div>
                <!-- Label -->
                <label for="birthday" class="required">Date of birth</label>
                <!-- Second row -->
                <div class="form-row row-eq-spacing">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <!-- Checkbox with empty label -->
                                    <div class="custom-checkbox" data-toggle="tooltip"
                                         data-title="This checkbox does birthday public.">
                                        <x-forms.checkbox id="show_birthday"
                                                          name="show_birthday"
                                                          :value="$user->information->show_birthday"
                                        />
                                        <label for="show_birthday" class="blank"></label>
                                    </div>
                                </div>
                            </div>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                   value="{{ $user->information->birthday }}" placeholder="Birthday"
                                   required="required">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="country" class="required">Country</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <!-- Checkbox with empty label -->
                                <div class="custom-checkbox" data-toggle="tooltip"
                                     data-title="This checkbox does country public.">
                                    <x-forms.checkbox id="show-country"
                                                      name="show_country"
                                                      :value="$user->information->show_country"
                                    />
                                    <label for="show-country" class="blank"></label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="country" name="country"
                               value="{{ $user->information->country }}" placeholder="Country">
                    </div>
                </div>
                <div class="col-sm">
                    <label for="city" class="required">City</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <!-- Checkbox with empty label -->
                                <div class="custom-checkbox" data-toggle="tooltip"
                                     data-title="This checkbox does city public.">
                                    <x-forms.checkbox id="show_city"
                                                      name="show_city"
                                                      :value="$user->information->show_city"
                                    />
                                    <label for="show-city" class="blank"></label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="city" name="city"
                               value="{{ $user->information->city }}" placeholder="City" required="required">
                    </div>
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="website">Website</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <!-- Checkbox with empty label -->
                                <div class="custom-checkbox" data-toggle="tooltip"
                                     data-title="This checkbox does website public.">
                                    <x-forms.checkbox id="show-website"
                                                      name="show_website"
                                                      :value="$user->information->show_website"
                                    />
                                    <label for="show-website" class="blank"></label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="website" name="website"
                               value="{{ $user->information->website }}" placeholder="Website">
                    </div>
                </div>
            </div>

            <!-- Submit button container -->
            <div class="text-right"> <!-- text-right = text-align: right -->
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Edit Password</x-slot>

        <form action="{{ route('update-user-password') }}" method="POST">
            @csrf
            <x-jet-validation-errors class="mb-3 rounded-0"/>
            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="current-password" class="required">Current password</label>
                    <input type="password" name="current_password" class="form-control" id="current-password"
                           placeholder="Current password" autocomplete="current_password"
                           required="required">
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="password" class="required">New password</label>
                    <input type="password" class="form-control" id="password" placeholder="New password"
                           required="required" name="password">
                </div>

                <div class="col-sm">
                    <label for="password-confirmation" class="required">Password confirmation</label>
                    <input type="password" class="form-control" id="password-confirmation"
                           placeholder="Password confirmation" required="required" name="password_confirmation">
                </div>
            </div>
            <div class="text-right"> <!-- text-right = text-align: right -->
                <button class="btn btn-primary" type="submit" value="Submit">Change password</button>
            </div>
        </form>
    </x-card-layout>
</x-app-layout>
