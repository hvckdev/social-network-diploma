<x-app-layout>
    <div class="content">
        @if($user->information)
            <x-alert handled="friends" class="p-0 py-10"/>
            <div class="row row-cols-2">
                <div class="w-400 mw-full col-sm"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
                    <div class="card p-0">
                        <!-- Card header -->
                        <div class="px-card py-10 border-bottom">
                            <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), border-bottom: adds a border on the bottom -->
                            <h2 class="card-title font-size-18 m-0">
                                <!-- font-size-18 = font-size: 1.8rem (18px), m-0 = margin: 0 -->
                                {{ $user->name }}
                                <span class="font-size-12 float-right text-muted">
                                last seen {{ $user->information->visited_at->diffForHumans() }}
                            </span>
                            </h2>
                        </div>
                        <!-- Content -->
                        <div class="content">
                            <div class="card-body text-center">
                                <p>
                                    <img src="{{ $user->profile_photo_url }}" alt=""
                                         class="w-lg-half shadow-sm rounded img-fluid">
                                </p>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="px-card py-10 bg-light-lm rounded-bottom text-center">
                            <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), bg-light-lm = background-color: var(--gray-color-light) only in light mode, bg-very-dark-dm = background-color: var(--dark-color-dark) only in dark mode, rounded-bottom = rounded corners on the bottom -->
                            @if($user->id !== auth()->user()->id)
                                <livewire:acquaintances.profile-friend-button :recipient="$user" class="mw-full"/>
                            @else
                                <a href="{{ route('profile.show') }}" class="btn w-full">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="w-400 mw-full col-sm"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
                    <div class="card p-0"> <!-- p-0 = padding: 0 -->
                        <!-- Card header -->
                        <div class="px-card py-10 border-bottom">
                            <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), border-bottom: adds a border on the bottom -->
                            <h2 class="card-title font-size-18 m-0">
                                <!-- font-size-18 = font-size: 1.8rem (18px), m-0 = margin: 0 -->
                                Information
                            </h2>
                        </div>
                        <!-- Content -->
                        <div class="content">
                            <p>
                                <span class="small text-muted">Full name</span><br>
                                {{ $user->full_name }}
                            </p>
                            <p>
                                <span class="small text-muted">Group</span><br>
                                <a
                                    href="{{ $user->information->group->id ?? false ? route('groups.show', $user->information->group->id) : '#' }}">
                                    {{ $user->information->group->name ?? 'Not in group' }}
                                </a>
                            </p>
                        </div>
                        <!-- Card footer -->
                        <div class="px-card py-10 bg-light-lm rounded-bottom">
                            <!-- py-10 = padding-top: 1rem (10px) and padding-bottom: 1rem (10px), bg-light-lm = background-color: var(--gray-color-light) only in light mode, bg-very-dark-dm = background-color: var(--dark-color-dark) only in dark mode, rounded-bottom = rounded corners on the bottom -->
                            <div class="text-center mt-20">
                                <button class="btn btn-sm" onclick="halfmoon.toggleModal('modal-6')">Show full</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @push('modals')
        <div class="modal" id="modal-6" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Full information</h5>
                    <p>
                        <span class="small text-muted">Email</span><br>
                        {{ $user->information->show_email ? $user->email : 'Hidden' }}
                    </p>
                    <p>
                        <span class="small text-muted">Birthday</span><br>
                        {{ $user->information->show_birthday ? $user->information->birthday : 'Hidden' }}
                    </p>
                    <p>
                        <span class="small text-muted">Country</span><br>
                        {{ $user->information->show_country ? $user->information->country : 'Hidden' }}
                    </p>
                    <p>
                        <span class="small text-muted">City</span><br>
                        {{ $user->information->show_city ? $user->information->city : 'Hidden' }}
                    </p>
                    <p>
                        <span class="small text-muted">Website</span><br>
                        <a href="{{ $user->information->show_website ? $user->information->website ?? '#' : '#' }}">
                            {{ $user->information->show_website ? $user->information->website ?? 'Empty :(' : 'Hidden' }}
                        </a>
                    </p>
                    <div class="text-right mt-20">
                        <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                        <button class="btn mr-5" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush
    @else
        <div class="card">
            <div class="card-body">
                <h3>User didn't pass registration</h3>
            </div>
        </div>
    @endif
</x-app-layout>
