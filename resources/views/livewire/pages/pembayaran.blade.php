<div>
    <div class="grid grid-cols-3 gap-4 md:mx-20">

        <div class="col-span-2">
            <x-card title="Informasi Pembayaran">
                <div class="pb-10">
                    <h1>Selamat Datang <br><strong class="text-lg capitalize">{{ auth()->user()->name }}</strong></h1>
                    <h1>Status Pembayaran Formulir Anda Belum Selesai</h1>
                    <h1>Silahkan Lanjutkan Ke Tahap Pembayaran Dengan No Rekening Dibawah ini</h1>
                    <div class="mt-10 text-center border border-dashed border-gray-400 rounded p-5 bg-yellow-100">
                       
                       
                        <h1 class="font-bold text-lg text-gray-600 py-5 md:text-3xl border-b-2 border-gray-800 border-dashed">  IDR 150.000 </h1>
                        <h1 class="font-bold md:text-lg text-gray-600 pt-2"> B R I </h1>
                        <h1 class="font-bold md:text-2xl"> 0648-0103-1486-502</h1>
                        <h1 class="font-bold md:text-lg text-gray-600"> A/N Suryani Usman</h1>
                    </div>
                    <div class="mt-3">
                        NOTE : Setelah Melakukan Pembayaran Silahkan Upload Bukti Pembayaran Tombol Di bawah
                    </div>

                </div>
            </x-card>
        </div>
        <div>
            <x-card title="Upload Bukti Pembayaran">
                <div class="mt-5" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress" wire:key="pasphoto">

                    <div class="my-2 text-sm">
                        Format Extensi (JPG,JPEG,PNG) : Minimal File 5MB
                    </div>
                    <x-input type="hidden" x-ref="bukti" class="hidden my-3" type="file"
                        accept="image/png, image/jpeg" wire:model="bukti" />

                    @if ($bukti || $maba->bukti)
                        <div class="relative ">
                            <img class="w-full object-cover h-56 border border-gray-800 "
                                src="{{ asset('storage/' . $maba->bukti) }}" alt="" />

                            <div class="absolute top-0 left-2 ">
                                <x-button wire:click="handlePreview('{{ $maba->bukti }}')" icon="eye"
                                    class="mt-2" label="Preview" primary />
                            </div>
                        </div>
                    @else
                        <div class="h-56 border mb-2 flex flex-col items-center justify-center">
                            NO IMAGE
                        </div>
                    @endif

                    <div x-show="isUploading" class="w-full">
                        <div class="w-full mt-3 bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                x-text="`${progress} %`" :style="`width: ${progress}%; `">0 %</div>
                        </div>

                    </div>
                    <x-button icon="cloud-upload" x-on:click="$refs.bukti.click()" class="mt-2"
                        label="Upload Bukti Pembayaran" primary />
                </div>
            </x-card>
        </div>
        <x-modal blur wire:model.defer="modalPreview">
            @if ($modalPreview && $filepathPreview)
                <div class="w-screen h-screen flex justify-center items-center flex-col">
                    <img src="{{ asset('storage/' . $filepathPreview) }}" alt="" />

                </div>
            @endif

        </x-modal>
    </div>
</div>
