<div class="sidebar">
    <div class="sidebar-menu">
        <!-- Sidebar brand -->
        <a href="#" class="sidebar-brand">
            {{ config('app.name') }}
        </a>
        <!-- Sidebar links and titles -->
        <h5 class="sidebar-title">Main</h5>
        <div class="sidebar-divider"></div>
        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-jet-nav-link>
        <br />
        <h5 class="sidebar-title">Your community</h5>
        <div class="sidebar-divider"></div>
        <a href="#" class="sidebar-link">Friends</a>
        <a href="#" class="sidebar-link">Messages</a>
    </div>
</div>
