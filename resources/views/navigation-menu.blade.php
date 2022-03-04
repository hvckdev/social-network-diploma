<nav class="navbar">
    @auth
        <div class="navbar-content">
            <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    @endauth
    <a href="{{ config('app.url') }}" class="navbar-brand ml-10 ml-sm-20">
        <span class="d-none d-sm-flex">{{ config('app.name') }}</span>
    </a>
    <div class="navbar-content ml-auto">
        <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
            <i class="fa fa-moon-o" aria-hidden="true"></i>
            <span class="sr-only">Toggle dark mode</span>
        </button>
        <div class="dropdown">
            <button class="btn btn-primary text-center" data-toggle="dropdown" type="button"
                    id="sign-in-dropdown-toggle-btn"
                    aria-haspopup="true" aria-expanded="false">
                @auth
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="" width="15" height="15">
                    {{ auth()->user()->name }} @endauth @guest Sign in @endguest <i class="fa fa-angle-down ml-5"
                                                                                    aria-hidden="true"></i>
                <!-- ml-5 = margin-left: 0.5rem (5px) -->
            </button>
            <div class="dropdown-menu dropdown-menu-right w-250 w-sm-350" aria-labelledby="sign-in-dropdown-toggle-btn">
                <!-- w-250 = width: 25rem (250px), w-sm-350 = width: 35rem (350px) only on devices where width > 576px -->
                <div class="dropdown-content p-20"> <!-- p-20 = padding: 2rem (20px) -->
                    @auth
                        <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                        <hr class="dropdown-divider">
                        <a href="{{ route('users.show', auth()->user()->id) }}" class="dropdown-item">Show profile</a>
                        <a href="{{ route('profile.show') }}" class="dropdown-item">Edit profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="required">Email</label>
                                <input type="text" name="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       placeholder="Email"
                                       required="required">
                                <x-jet-input-error for="email"></x-jet-input-error>
                            </div>
                            <div class="form-group">
                                <label for="password" class="required">Password</label>
                                <input id="password" type="password" name="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="Password"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <div class="custom-switch">
                                    <input type="hidden" name="remember_me" value="0">
                                    <input type="checkbox" id="remember" name="remember_me" value="on">
                                    <label for="remember">Remember me</label>
                                </div>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" value="Sign in">
                            <div class="text-right mt-10">
                                <!-- text-right = text-align: right, margin-top: 1rem (10px) -->
                                <a href="{{ route('password.request') }}" class="hyperlink">Forgot password?</a>
                                <!-- hyperlink = used on regular links to remove anti-aliasing in dark mode -->
                            </div>
                        </form>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item text-center">Don't have an account? Sign up</a>
                <!-- text-center = text-align: center -->
                @endguest
            </div>
        </div>
    </div>
</nav>
@auth
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
    <div class="sidebar">
        <div class="sidebar-menu">
            <!-- Sidebar brand -->
            <a href="#" class="sidebar-brand">
                {{ config('app.name') }}
            </a>
            <!-- Sidebar links and titles -->
            <h5 class="sidebar-title">Your place</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <span class="sidebar-icon">
                <i class="fa-regular fa-chart-line"></i>
            </span>
                {{ __('Dashboard') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('friends.index') }}" :active="request()->routeIs('friends.index')">
                            <span class="sidebar-icon">
                <i class="fa-solid fa-user-group"></i>
            </span>
                {{ __('Friends') }}
                <livewire:acquaintances.components.requests-badge/>
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('threads.index') }}" :active="request()->routeIs('messages.index')">
                            <span class="sidebar-icon">
               <i class="fa-regular fa-inbox"></i>
            </span>
                {{ __('Messages') }}
                <livewire:messenger.components.unread-badge/>
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('blog.index') }}">
                            <span class="sidebar-icon">
                                <i class="fa-brands fa-microblog"></i>

            </span>
                {{ __('Your blog') }}
            </x-jet-nav-link>
            <br/>
            <h5 class="sidebar-title">Information</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="#">
                            <span class="sidebar-icon">
              <i class="fa-regular fa-calendar-check"></i>
            </span>
                {{ __('Schedule') }}
            </x-jet-nav-link>
            <br/>
            <h5 class="sidebar-title">Group</h5>
            <div class="sidebar-divider"></div>
            @if(auth()->user()->information->in_group ?? false)
                <x-jet-nav-link href="{{ route('groups.show', auth()->user()->information->group->id ?? 1) }}"
                                :active="request()->routeIs('groups.show', auth()->user()->information->group->id ?? 1)">
                            <span class=" sidebar-icon">
                <i class="fa-regular fa-campground"></i>
                </span>
                    {{ __('Show your group') }}
                </x-jet-nav-link>
            @else
                <small class="text-muted sidebar-content">You haven't been assigned to any group.</small>
            @endif
            @can('edit-groups')
                <x-jet-nav-link href="{{ route('groups.edit', auth()->user()->information->group->id ?? 1) }}"
                                :active="request()->routeIs('groups.edit', auth()->user()->information->group->id ?? 1)">
                    <span class="sidebar-icon"><i class="fa-regular fa-pen-to-square"></i></span>
                    {{ __('Edit your group') }}
                </x-jet-nav-link>
            @endcan
            <br/>
            <h5 class="sidebar-title">Other</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            <span class="sidebar-icon">
                <i class="fa-solid fa-users"></i>
            </span>
                {{ __('All users') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('groups.index') }}" :active="request()->routeIs('groups.index')">
                            <span class="sidebar-icon">
                <i class="fa-regular fa-user-group"></i>
            </span>
                {{ __('All groups') }}
            </x-jet-nav-link>
        </div>
    </div>
@endauth
