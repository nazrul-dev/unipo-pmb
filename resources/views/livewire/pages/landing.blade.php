<div>
    <img class="fixed inset-0 h-full object-cover w-full z-0 opacity-25" src="https://gopos.id/wp-content/uploads/2020/03/WhatsApp-Image-2020-03-25-at-15.33.29.jpeg" alt="">
   <div class="fixed inset-0 h-screen">
    <div class="flex flex-col h-screen justify-center items-center z-10">
        <img class="w-20 h-20 mb-5" src={{ asset('logoone.png') }} />
        <h1 class="text-gray-700 font-semibold md:text-normal text-xs text-center">SELAMAT DATANG DI WEBSITE PENDAFTARAN MABA</h1>
        <h1 class="text-lg md:text-2xl font-bold text-gray-700">UNIVERSITAS POHUWATO </h1>
        <h1 class="md:text-lg font-bold text-gray-700">Tahun Akademik {{ date('Y') }} /
            {{ date('Y', strtotime('+1 years')) }} </h1>
           
        <div class="flex items-center gap-2 border-t-2  pt-3 border-gray-300">
            <x-button href="{{route('login')}}" primary>
                Login
            </x-button>
            <x-button href="{{route('reg')}}" positive>
                Registrasi
            </x-button>
        </div>
    </div>
   </div>
</div>
