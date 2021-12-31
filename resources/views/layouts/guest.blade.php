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
        <!-- Halfmoon CSS -->
        <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon-variables.min.css" rel="stylesheet" />

        @livewireStyles

        <!-- Scripts -->
        <!-- Halfmoon JS -->
        <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>

        <script src="https://kit.fontawesome.com/9c68ecdcd7.js" crossorigin="anonymous"></script>
    </head>

    <body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-mode-onload="true">>
    <div class="page-wrapper with-navbar with-navbar-fixed-bottom">
        @livewire('navigation-menu')
        <div class="content-wrapper">
            {{ $slot }}
        </div>
    </body>
</html>
