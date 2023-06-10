<x-guest-layout>
    <style>
        .bg-white {
            background-color: white;
        }
        .font-input {
            color: black !important;
        }
        .welcome-title {
            font-size: 32px; 
            text-align: center;
            color: rgb(0, 0, 0);
            margin-top: 20px;
            text-decoration: bold;
        }
        .sub-title {
            font-size: 16px; 
            text-align: center;
            /* color: green;  */
        }
        .button-login {
            display: flex;
            margin-top: 5px;
            margin-bottom: 10px;
            justify-content: center;
            align-items: center;
            background-color: #379237;
            color: white;
            height: 40px;
            width: 100%;
        }
    </style>

    <h1 class="welcome-title">Welcome Admins!</h1>
    <p class="sub-title">Masukkan Kode Admin dan kata sandi Anda untuk masuk</p><br>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        {{-- <div class="mt-4 mb-4">
            <x-input-label for="admin_kode" :value="__('Kode Admin')" />
            <x-text-input id="admin_kode" class="block mt-1 w-full bg-white font-input" type="text" name="admin_kode" :value="old('admin_kode')" required autofocus autocomplete="admin kode" />
            <x-input-error :messages="$errors->get('admin_kode')" class="mt-2" />
        </div> --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full bg-white font-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full bg-white font-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-white border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div>
            <x-primary-button class="button-login">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        {{-- <div class="center">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="register-link text-center mt-10 mb-10">
            <span>Belum memiliki akun?</span>
            <a style="color: #54B435" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div> --}}
    </form>
</x-guest-layout>
