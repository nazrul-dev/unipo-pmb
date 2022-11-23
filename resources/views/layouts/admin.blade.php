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
    {{-- <link rel="stylesheet" href="{{ asset('build/' . getManifestAssets()['css']) }}" />
    <script src="{{ asset('build/assets/' . getManifestAssets()['js']) }}" defer></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="soft-scrollbar font-sans antialiased text-slate-500  bg-gray-200 ">
    <div id="app">

        <x-dialog z-index="z-50" blur="lg" align="center" />
        <x-notifications z-index="z-50" position="top-right" />
        <div class="fixed border md:w-[40vh] z-0 bg-white h-screen">
            <div class="mt-5 md:block hidden">

                <h1 class="text-center font-bold">PMB ADMIN BETA</h1>
                <ul class="p-5 space-y-5 mt-10">
                    {{-- <li><a href="{{ route('admin.dashboard') }}">Dashboard</a> </li> --}}
                    <li><a href="{{ route('admin.maba') }}"> Maba</a> </li>
                    {{-- <li><a href="{{ route('admin.maba.arsip') }}"> Arsip Maba</a></li>
                    <li><a href="{{ route('admin.setting') }}">Pengaturan</a> </li> --}}
                    <li><a href="{{ route('admin.change.password') }}">Ganti Password</a> </li>
                </ul>
            </div>
        </div>
        <div class="md:w-[calc(100%-40vh)] ml-auto">

            <div class="w-full">
                <div class="p-4 bg-gray-100 text-gray-800 flex justify-between items-center">
                    <div>
                        Hello {{ auth()->user()->name }}
                    </div>
                    <div class="md:block hidden">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit">Keluar</button>
                        </form>
                    </div>
                    <div class=" sm:hidden">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <x-button.circle icon="menu-alt-3" align="left" primary />
                            </x-slot>
                            {{-- <x-dropdown.item href="{{ route('admin.dashboard') }}" label="Dashboard" /> --}}
                            <x-dropdown.item href="{{ route('admin.maba') }}" label=" Maba" />
                            {{-- <x-dropdown.item href="{{ route('admin.maba.arsip') }}" label=" Arsip Maba" />
                            <x-dropdown.item href="{{ route('admin.setting') }}" label="Pengaturan" /> --}}
                            <x-dropdown.item href="{{ route('admin.change.password') }}" label="Ganti Password" />
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button
                                    class="w-full text-left text-secondary-600 px-4 py-2 text-sm  items-center cursor-pointer rounded-md transition-colors duration-150 hover:text-secondary-900 hover:bg-secondary-100 dark:text-secondary-400 dark:hover:bg-secondary-700"
                                    type="submit">Keluar</button>
                            </form>
                        </x-dropdown>
                    </div>
                </div>
                <div class="p-5">
                    {{ $slot }}
                </div>

            </div>

        </div>
    </div>
    <!-- Scripts -->

    @livewireScripts
    @powerGridScripts
</body>

</html>
