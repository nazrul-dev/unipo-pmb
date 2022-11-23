<div>
    <img class="fixed inset-0 h-full w-full z-0 opacity-25"
        src="https://gopos.id/wp-content/uploads/2020/03/WhatsApp-Image-2020-03-25-at-15.33.29.jpeg" alt="">
    <div class="py-5 fixed overflow-y-auto inset-0 z-10 h-screen">
        <div class="flex flex-col items-center justify-center mb-5">
            <img class="w-20 h-20 mb-5" src={{ asset('logoone.png') }} />
            <h1 class="text-center md:text-sm text-xs text-gray-800">Selamat Datang Di Halaman Pendaftaran Mahasiwa Baru</h1>
            <h1 class="text-2xl font-bold text-gray-700">UNIVERSITAS POHUWATO </h1>
            <h1 class="text-lg font-bold text-gray-700">Tahun Akademik {{ date('Y') }} /
                {{ date('Y', strtotime('+1 years')) }} </h1>
        </div>
        <div class="md:w-1/2 md:p-0 px-3 mx-auto">
            <div class="{{ $step == 1 ? 'block' : 'hidden' }}">

                <x-card title="STEP {{ $step }} - Biodata" class="shadow-lg">
                    <div class="rounded-lg border-dashed border border-gray-400 p-5 mt-5">
                        <div class="grid grid-cols-1 gap-3">
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="no_reg" value="Nomor Registrasi" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input wire:model="no_reg" type="text" readonly />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="email" value="Email" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input type="email" wire:model.defer="email" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="nama" value="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input type="text" wire:model.defer="nama" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="jk" value="Jenis Kelamin" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <div class="grid grid-cols-2 gap-5">
                                        <x-radio id="right-label" label="Laki laki" value="Laki-laki"
                                            wire:model.defer="jk" />
                                        <x-radio id="right-label" label="Perempuan" value="Perempuan"
                                            wire:model.defer="jk" />
                                    </div>

                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="tl" value="Tempat Lahir" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input wire:model.defer="tl" type="text" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="ttl" value="Tempat Tanggal Lahir" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-datetime-picker without-time display-format="DD-MM-YYYY"
                                        wire:model.defer="ttl" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="agama" value="Agama" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-native-select placeholder="Pilih Agama" :options="['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha', 'Lainnya']"
                                        wire:model.defer="agama" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="alamat" value="Alamat" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input wire:model.defer="alamat" type="text" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="tlp" value="Telepon / HP" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input type="number" wire:model.defer="tlp"  />

                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="asal_sekolah" value="Asal Sekolah" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-input wire:model.defer="asal_sekolah" type="text" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="jurusan" value="Jurusan" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-native-select placeholder="Pilih Jurusan" :options="['IPA', 'IPS', 'BAHASA', 'Lainnya']"
                                        wire:model="jurusan" />
                                    @if ($jurusanCustomShow)
                                        <div class="mt-2">
                                            <x-input wire:model.defer="jurusanCustom" type="text" />
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="pk" value="Ukuran Baju" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-native-select placeholder="Pilihan Ukuran Baju" :options="['S', 'M', 'L', 'XL', 'XXL']"
                                        wire:model.defer="ukuran_baju" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="pk" value="Pilihan Kelas" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-native-select placeholder="Pilihan Kelas" :options="['Reguler', 'Karyawan']"
                                        wire:model.defer="pk" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3">
                                <div>
                                    <div class="block mt-2">
                                        <x-labels htmlFor="pk" value="Program Studi" />
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <x-select placeholder="Pilih Prodi" wire:model.defer="prodi">
                                        <x-select.option value='HUKUM - ILMU HUKUM S1'
                                            label="HUKUM - ILMU HUKUM S1" />>
                                        <x-select.option value='PERTANIAN - AGROTEKNOLOGI S1'
                                            label="PERTANIAN - AGROTEKNOLOGI S1" />
                                        <x-select.option value='PERTANIAN - AKUAKULTUR S1'
                                            label="PERTANIAN - AKUAKULTUR S1" />
                                        <x-select.option value='ILMU KOMPUTER - SISTEM INFORMASI S1'
                                            label="ILMU KOMPUTER - SISTEM INFORMASI S1" />
                                        <x-select.option value='ILMU KOMPUTER - INFORMATIKA S1'
                                            label="ILMU KOMPUTER - TEKNIK INFORMATIKA S1" />
                                        <x-select.option value='TEKNIK - TEKNIK ARSITEKTUR S1'
                                            label="TEKNIK - TEKNIK ARSITEKTUR S1" />
                                        <x-select.option value='TEKNIK -  TEKNIK SIPIL S1'
                                            label="TEKNIK -  TEKNIK SIPIL S1" />
                                        <x-select.option value='TEKNIK - PERENCANAAN WILAYAH S1'
                                            label="TEKNIK - PERENCENAAN WILAYAH DAN KOTA S1" />
                                        <x-select.option value='PGSD - PENDIDIKAN BAHASA INGGRIS S1'
                                            label="PGSD - PENDIDIKAN BAHASA INGGRIS S1" />
                                        <x-select.option value='PGSD - PENDIDIKAN MATEMATIKA S1'
                                            label="PGSD - PENDIDIKAN MATEMATIKA S1" />
                                        <x-select.option value='PGSD - ADMINISTRASI PENDIDIKAN S1'
                                            label="PGSD - ADMINISTRASI PENDIDIKAN S1" />
                                        <x-select.option value='PGSD - PENDIDIKAN GURU SEKOLAH DASAR S1'
                                            label="PGSD - PENDIDIKAN GURU SEKOLAH DASAR S1" />
                                        <x-select.option value='SOSPOL - ILMU PEMERINTAHAN S1'
                                            label="SOSPOL - ILMU PEMERINTAHAN S1" />
                                    </x-select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <x-slot name="footer">
                        <div class="flex justify-end items-center">

                            <x-button label="Lanjut" type="button" wire:click="handleStep2" spinner="handleStep2"
                                primary />
                        </div>
                    </x-slot>
                </x-card>

            </div>



            <div class="{{ $step == 2 ? 'block' : 'hidden' }}">
                <x-card title="STEP {{ $step }} - Pas Photo">
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress" wire:key="pasphoto"
                        class="rounded-lg border-dashed border border-gray-400 p-5 mt-5">
                        <div class="flex flex-col items-center justify-center">
                            @if ($photo)
                                <img class="w-[113px] h-[151px] border border-gray-800 "
                                    src="{{ asset('storage/tmp/' . $photo->getFilename()) }}" alt="" />
                            @else
                                <div
                                    class="w-[113px] h-[151px] border border-gray-800 flex flex-col items-center justify-center">
                                    <div class="">
                                        3 X 4
                                    </div>
                                </div>
                            @endif

                            <x-input type="hidden" x-ref="pasphoto" class="hidden my-3" type="file"
                                accept="image/png, image/jpeg" wire:model="photo" />
                            <x-button icon="cloud-upload" x-on:click="$refs.pasphoto.click()" class="mt-2"
                                label="Upload Format (JPG,JPEG,PNG)" primary />
                            <div x-show="isUploading" class="w-full">
                                <div class="w-full mt-3 bg-gray-200 rounded-full dark:bg-gray-700">
                                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        x-text="`${progress} %`" :style="`width: ${progress}%; `">0 %</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <x-slot name="footer">
                        <div class="flex justify-end items-center">
                            <div class="flex items-center gap-x-2">
                                <x-button type="button" label="Kembali" wire:click="changeStep(1)"
                                    spinner="changeStep(1)" />
                                <x-button type="button" label="Lanjut" wire:click="selesai" spinner="selesai"
                                    primary />
                            </div>
                        </div>
                    </x-slot>
                </x-card>
            </div>

            <div class="{{ $step == 3 ? 'block' : 'hidden' }}">
                <x-card>
                    <h1>Selamat Registrasi Formulir Anda Telah Berhasil selanjutnya Login Dengan Akun Yang terterah Di
                        bawah
                        ini </h1>
                    <div class="border border-dashed p-5 mt-5 rounded bg-blue-100">
                        <ul>
                            <li>NO.REG : {{ $no_reg }}</li>
                            <li>EMAIL : {{ $email }}</li>
                            <li>PASSWORD : {{ $password }}</li>
                            <li>LINK LOGIN : <a class="text-blue-700" href="{{ route('login') }}">{{ route('login') }}</a></li>
                        </ul>
                    </div>
                    <p class="mt-2 text-red-600 text-sm">NOTE : Harap Catat Email Dan Password </p>
                </x-card>

            </div>

        </div>
    </div>

</div>
