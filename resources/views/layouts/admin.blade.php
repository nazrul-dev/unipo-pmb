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

<body class="soft-scrollbar font-sans antialiased text-slate-500  bg-gray-200 ">
    <div id="app">

        <x-dialog z-index="z-50" blur="lg" align="center" />
        <x-notifications z-index="z-50" position="top-right" />
        <div class="grid grid-cols-12 ">
            <div class="col-span-2 min-h-screen bg-white sticky top-0">
               <div class="mt-5">

                <h1 class="text-center font-bold">PMB ADMIN BETA</h1>
                <ul class="p-5 space-y-5 mt-10">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a> </li>
                    <li><a href="{{route('admin.maba')}}"> Maba</a> </li>
                    <li><a href="{{route('admin.maba.arsip')}}"> Arsip Maba</a></li>
                    <li><a href="{{route('admin.setting')}}">Pengaturan</a> </li>
                    <li><a href="{{ route('admin.change.password') }}">Ganti Password</a> </li>
                </ul>
               </div>
            </div>
            <div class="col-span-10 ">
                <div class="p-4 bg-gray-100 text-gray-800 flex justify-between items-center">
                    <div>
                        Hello {{auth()->user()->name}}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
            
                        <button type="submit">Keluar</button>
                    </form>
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
