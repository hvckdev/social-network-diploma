<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/halfmoon.min.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/halfmoon.min.js') }}" defer></script>

</head>
<body>
    <div class="page-wrapper with-sidebar">
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main class="content-wrapper">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </div>
</body>
</html>
