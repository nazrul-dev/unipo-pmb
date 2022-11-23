<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PMB UNIPO') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @livewireStyles
    @wireUiScripts

    @powerGridStyles
    <link rel="stylesheet" href="{{ asset('build/'.getManifestAssets()['css']) }}" />
    <script src="{{ asset('build/assets/'.getManifestAssets()['js']) }}" defer></script>   {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="soft-scrollbar font-sans antialiased text-slate-500 dark:text-slate-400 bg-gray-200 dark:bg-slate-900">
    <div id="app">
        {{-- <div id="connection-checker-full-screen">
            <div class="middle-center z-50">
                <span>You are not connected to the internet. Check your internet
                    connection.</span>
            </div>
        </div> --}}
        <x-dialog z-index="z-50" blur="lg" align="center" />
        <x-notifications z-index="z-50" position="top-right" />
        @include('layouts.navigation')
        @if (isset($header))
            {{-- <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}
        @endif
        <div class="min-h-screen p-5 ">
            {{ $slot }}
        </div>
    </div>
    <!-- Scripts -->

    @livewireScripts
    @powerGridScripts
</body>

</html>
