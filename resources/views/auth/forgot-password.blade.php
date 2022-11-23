<x-auth-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div> --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div>
            HARAP HUBUNGI KONTAK ADMIN DIBAWAH INI
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center gap-2">
                <a target="_blank" class="whitespace-nowrap bg-green-500 rounded-full py-1.5 px-4 text-white"
                    href="https://wa.me/6282346824903?text=Halo%20Admin%20Saya%20Mengalami%20Lupa%20Password%20Bisa%20mohon%20bantuanya">
                    Taufik +62 823-4682-4903
                </a>
                <a target="_blank" class="whitespace-nowrap bg-green-500 rounded-full py-1.5 px-4 text-white"
                    href="https://wa.me/6285341903339?text=Halo%20Admin%20Saya%20Mengalami%20Lupa%20Password%20Bisa%20mohon%20bantuanya">
                    Agus +62 853-4190-3339
                </a>
            </div>
        </div>
        {{-- <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form> --}}
    </x-auth-card>
</x-auth-layout>
