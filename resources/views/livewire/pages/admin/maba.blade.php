<div>
    <x-card title="Maba">
        @livewire('maba-table')
    </x-card>
    <x-modal.card title=" {{ $type == 'reset' ? 'Reset Password' : 'Konfirmasi' }}" max-width="sm" blur
        wire:model.defer="modalKonfirmasi">

        <x-input label="Nomor Registrasi" wire:model="no_reg" placeholder="Masukan Nomor Registrasi" />
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">


                <div class="flex ">

                    <div class="{{ $showButton || $showButtonReset ? 'hidden' : 'flex' }}  justify-center items-center ">
                        <x-button class="mx-2 {{ $cekBtn ? '' : 'hidden' }}" primary wire:click="cek()" spinner="cek"
                            label="Check" />

                        <x-button class="mx-2 {{ $cekBtn ? 'hidden' : '' }}" label="Check"
                            disabled={{ true }} />
                    </div>
                    <div
                        class="{{ $showButtonBayar && $type != 'reset' ? 'flex' : 'hidden' }}  justify-center items-center ">
                        <x-button class="mx-2 {{ $cekBtn ? '' : 'hidden' }}" primary wire:click="bayar()" spinner="cek"
                            label="Konfirmasi Pembayaran" />
                    </div>
                    <div
                        class="{{ $showButtonTerima && $type != 'reset' ? 'flex' : 'hidden' }}  justify-center items-center ">
                        <x-button class="mx-2 {{ $cekBtn ? '' : 'hidden' }}" primary wire:click="terima()"
                            spinner="terima" label="Konfirmasi Formulir" />
                    </div>
                    <div
                        class="{{ $showButtonReset && $type == 'reset' ? 'flex' : 'hidden' }}  justify-center items-center ">
                        <x-button class="mx-2" primary wire:click="resetPass()" spinner="resetPass"
                            label="Reset Password" />
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal.card>
    <x-modal blur wire:model.defer="modalPass">
        <div class="bg-white p-5 rounded  text-center">
            <h1 class="mb-2">Ini Password Baru Anda Harap Catat Dan Simpan</h1>
            <strong class="text-2xl pt-5">{{ $pass }}</strong>
        </div>
    </x-modal>
    <x-modal blur wire:model.defer="modalPreview">
        @if ($modalPreview && $filepathPreview)
            <div class="w-screen h-screen flex justify-center items-center flex-col">

                <img src="{{ asset('storage/' . $filepathPreview) }}" alt="" />

            </div>
        @endif

    </x-modal>
</div>
