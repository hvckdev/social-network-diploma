<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit Profile Information</x-slot>

        <form action=..." method="...">
            <div class="form-group">
                <label for="name" class="required">Nickname</label>
                <input type="text" class="form-control" id="name" placeholder="Nickname"
                       required="required">
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="email" class="required">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" value=""
                           required="required">
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="first-name" class="required">First name</label>
                    <input type="text" class="form-control" id="first-name" placeholder="First name"
                           required="required">
                </div>
                <div class="col-sm">
                    <label for="last-name">Middle name</label>
                    <input type="text" class="form-control" id="last-name" placeholder="Middle name">
                </div>
                <div class="col-sm">
                    <label for="last-name" class="required">Last name</label>
                    <input type="text" class="form-control" id="last-name" placeholder="Last name"
                           required="required">
                </div>
            </div>

            <!-- Second row container -->
            <div>
                <!-- Label -->
                <label for="day-of-birth" class="required">Date of birth</label>
                <!-- Second row -->
                <div class="form-row row-eq-spacing">
                    <div class="col">
                        <input type="text" class="form-control" id="day-of-birth" placeholder="Day"
                               pattern="[0-9]*" inputmode="numeric" required="required">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="month-of-birth" placeholder="Month"
                               pattern="[0-9]*" inputmode="numeric" required="required">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="year-of-birth" placeholder="Year"
                               pattern="[0-9]*" inputmode="numeric" required="required">
                    </div>
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="country" class="required">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Country">
                </div>
                <div class="col-sm">
                    <label for="city" class="required">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" required="required">
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" id="website" placeholder="Website">
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

        <form>
            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="current-password" class="required">Current password</label>
                    <input type="password" class="form-control" id="current-password" placeholder="Current password"
                           required="required">
                </div>
            </div>

            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="password" class="required">New password</label>
                    <input type="password" class="form-control" id="password" placeholder="New password"
                           required="required">
                </div>

                <div class="col-sm">
                    <label for="password-confirmation" class="required">Password confirmation</label>
                    <input type="password" class="form-control" id="password-confirmation"
                           placeholder="Password confirmation" required="required">
                </div>
            </div>
            <div class="text-right"> <!-- text-right = text-align: right -->
                <button class="btn btn-primary" type="submit" value="Submit">Change password</button>
            </div>
        </form>
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">2FA</x-slot>

        <div class="form-row row-eq-spacing-sm">
        </div>
        <div class="text-right"> <!-- text-right = text-align: right -->
            <button class="btn btn-primary" type="submit" value="Submit">Enable</button>
        </div>
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Your sessions</x-slot>

        {{--        @if (count(auth()->user()->sessions) > 0)--}}
        {{--            <div class="form-group">--}}
        {{--                <!-- Other Browser Sessions -->--}}
        {{--                @foreach ($this->sessions as $session)--}}
        {{--                    <div class="d-flex">--}}
        {{--                        <div>--}}
        {{--                            @if ($session->agent->isDesktop())--}}
        {{--                                <svg fill="none" width="32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="text-muted">--}}
        {{--                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>--}}
        {{--                                </svg>--}}
        {{--                            @else--}}
        {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-muted">--}}
        {{--                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>--}}
        {{--                                </svg>--}}
        {{--                            @endif--}}
        {{--                        </div>--}}

        {{--                        <div class="ms-2">--}}
        {{--                            <div>--}}
        {{--                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}--}}
        {{--                            </div>--}}

        {{--                            <div>--}}
        {{--                                <div class="small font-weight-lighter text-muted">--}}
        {{--                                    {{ $session->ip_address }},--}}

        {{--                                    @if ($session->is_current_device)--}}
        {{--                                        <span class="text-success font-weight-bold">{{ __('This device') }}</span>--}}
        {{--                                    @else--}}
        {{--                                        {{ __('Last active') }} {{ $session->last_active }}--}}
        {{--                                    @endif--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        @endif--}}

        <div class="text-right"> <!-- text-right = text-align: right -->
            <button class="btn btn-primary" type="submit" value="Submit">Terminate all sessions</button>
        </div>
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Privacy</x-slot>

        <form>
            <div class="form-row row-eq-spacing-sm">

            </div>
        </form>

        <div class="text-right"> <!-- text-right = text-align: right -->
            <button class="btn btn-primary" type="submit" value="Submit">Save</button>
        </div>
    </x-card-layout>
</x-app-layout>
