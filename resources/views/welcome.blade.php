<x-app-layout>
    <div class="content">
        <div class="card">
            <div class="card-title">
                @auth
                    Hello, {{ auth()->user()->name }}!
                @else
                    <div class="row">
                        <div class="col">
                            Hello! You are not authorized.
                        </div>
                        <div class="col">
                            Register to be able to:
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @auth
                    <a class="btn btn-primary mt-5" href="{{ route('dashboard') }}">Go To Dashboard</a>
                @else
                    <div class="row">
                        <div class="col">
                            <p>If you dont have an account you have to register it
                                <a href="{{ route('register') }}">
                                    Here
                                </a>.
                            </p>
                            <p>If you already registered, please
                                <a href="{{ route('login') }}">Login</a>
                            </p>
                        </div>
                        <div class="col">
                            <ul>
                                <li>messaging</li>
                                <li>add friends</li>
                                <li>show blogs</li>
                                <li>create own articles in blog</li>
                                <li>show your schedule</li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
