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
    <script src="{{ asset('build/'.getManifestAssets()['js']) }}" defer></script>   {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="soft-scrollbar font-sans antialiased text-slate-500  bg-gray-200 ">
    <div id="app">
        {{-- <div id="connection-checker-full-screen">
            <div class="middle-center z-50">
                <span>You are not connected to the internet. Check your internet
                    connection.</span>
            </div>
        </div> --}}
        <x-dialog z-index="z-50" blur="lg" align="center" />
        <x-notifications z-index="z-50" position="top-right" />
        <div class="p-10">
            {{ $slot }}
        </div>
    </div>
    <!-- Scripts -->

    @livewireScripts
    @powerGridScripts
</body>

</html>
