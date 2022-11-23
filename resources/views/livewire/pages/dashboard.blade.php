<div>

    <div class="grid md:grid-cols-3 gap-4 md:mx-20">
        <x-card title="Photo">
            <img class="md:h-72 h-56 w-full" src="{{ asset('storage/' .auth()->user()->cekMaba()->photo) }}" alt="passphoto">
        </x-card>
        <div class="md:col-span-2">
            <x-card title="Overview">
                <div class="mb-3 md:text-lg text-xs">
                    <h1 class="font-bold">Nomor Registrasi :  {{auth()->user()->cekMaba()->no_reg}}</h1>
                    Silahkan Selesaikan Step Pendaftaran Mahasiswa Baru
                </div>
                <div class="flex flex-col gap-2">
                    <div class="bg-green-200 p-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <div class="w-3 h-3  rounded-full bg-green-900"></div> <span
                                class="text-green-800 md:text-lg text-xs"><strong>STEP 1.</strong> Registrasi Pendaftaran</span>
                        </div>
                        <div class="bg-green-800 rounded ">
                            <x-icon class="w-5 h-5 text-white" name="check" />
                        </div>
                    </div>
                    @if (auth()->user()->cekMaba()->terbayar)
                    <div class="bg-green-200 p-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <div class="w-3 h-3  rounded-full bg-green-900"></div> <span
                                class="text-green-800 md:text-lg text-xs"><strong>STEP 2.</strong> Registrasi Pendaftaran</span>
                        </div>
                        <div class="bg-green-800 rounded ">
                            <x-icon class="w-5 h-5 text-white" name="check" />
                        </div>
                    </div>
                    <div class="bg-green-200 p-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <div class="w-3 h-3  rounded-full bg-green-900"></div> <span
                                class="text-green-800 md:text-lg text-xs"><strong>STEP 3.</strong> Download Dan Print Formulir</span>
                        </div>
                        <div class="bg-green-800 rounded ">
                            <x-icon class="w-5 h-5 text-white" name="check" />
                        </div>
                    </div>
                    @else
                    <div class="bg-rose-200 p-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <div class="w-3 h-3  rounded-full bg-rose-900"></div> <span
                                class="text-rose-800 md:text-lg text-xs"><strong>STEP 2.</strong> Pembayaran Formulir Pendaftaran</span>
                        </div>
                        <div class="bg-rose-800 rounded ">
                            <x-icon class="w-5 h-5 text-white" name="x" />
                        </div>
                    </div>
                    <div class="bg-red-200 p-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-x-3">
                            <div class="w-3 h-3  rounded-full bg-red-900"></div> <span
                                class="text-red-800 md:text-lg text-xs"><strong>STEP 3.</strong> Download Dan Print Formulir</span>
                        </div>
                        <div class="bg-red-800 rounded ">
                            <x-icon class="w-5 h-5 text-white" name="x" />
                        </div>
                    </div>
                    @endif
                    
                </div>
            </x-card>
        </div>

    </div>
   
</div>
