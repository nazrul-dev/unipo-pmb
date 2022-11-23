

<nav class="bg-white flex justify-between items-center p-2 px-5">
    <div class="flex items-center space-x-2">
        <img class="w-10 h-10" src="{{ asset('logoone.png') }}" alt="">
        <h1 class="font-bold md:block hidden">PMB UNIPO</h1>
    </div>
    <div class="hidden md:flex items-center  space-x-2 mx-20">
        <ul class="flex gap-x-4   ">
            <li class="hover:text-gray-900"><a href="{{ route('dashboard') }}">Dashboard</a> </li>
            @if (!auth()->user()->cekMaba()->terbayar)
                <li
                    class="hover:text-gray-900 flex items-center gap-x-2 {{ !auth()->user()->cekMaba()->terbayar? 'animate-pulse': '' }}">
                    <a href="{{ route('pembayaran') }}">Pembayaran </a>
                    @if (!auth()->user()->cekMaba()->terbayar)
                        <div class="w-3 h-3  rounded-full bg-red-600"></div>
                    @endif
                </li>
            @else
                <li class="hover:text-gray-900"><a href="{{ route('formulir.download') }}">Download Formulir</a> </li>
            @endif

            <li class="hover:text-gray-900"><a href="{{ route('profile.edit') }}">Ganti Password</a> </li>
          
        </ul>
    </div>
    <div class="hidden md:flex items-center space-x-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">Keluar</button>
        </form>

    </div>
    <div class=" sm:hidden">
        <x-dropdown>
            <x-slot name="trigger">
                <x-button.circle icon="menu-alt-3" align="left"  primary />
            </x-slot>
            <x-dropdown.item href="{{ route('dashboard') }}" label="Dashboard" />
            @if (!auth()->user()->cekMaba()->terbayar)
               
                <x-dropdown.item href="{{ route('pembayaran') }}" label="Pembayaran" />
            @else
              
                <x-dropdown.item href="{{ route('formulir.download') }}" label="Download Formulir" />
            @endif
            
            <x-dropdown.item href="{{ route('profile.edit') }}" label="Ganti Passwsord" />
           
            <form method="POST" action="{{ route('logout') }}">
                @csrf
    
                <button class="w-full text-left text-secondary-600 px-4 py-2 text-sm  items-center cursor-pointer rounded-md transition-colors duration-150 hover:text-secondary-900 hover:bg-secondary-100 dark:text-secondary-400 dark:hover:bg-secondary-700" type="submit">Keluar</button>
            </form>
        </x-dropdown>
    </div>
</nav>
