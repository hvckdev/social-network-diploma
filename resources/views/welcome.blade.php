<x-app-layout>
    <div class="content">
        <div class="card">
            <div class="card-title">
                @auth
                    Hello, {{ auth()->user()->name }}!
                @else
                    Hello! You are not authorized.
                @endif
            </div>
            <div class="card-body">
                @auth
                    <a class="btn btn-primary mt-5" href="{{ route('dashboard') }}">Go To Dashboard</a>
                @else
                    <p>If you dont have an account you have to register it
                        <a href="{{ route('register') }}">
                            Here
                        </a>.
                    </p>
                    <p>If you already registered, please
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
