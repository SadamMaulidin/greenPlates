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
            color: #54B435;
            margin-top: 20px;
        }
        .sub-title {
            font-size: 16px; 
            text-align: center;
            /* color: green;  */
        }
        .button-register {
            display: flex;
            margin-top: 30px;
            justify-content: center;
            align-items: center;
            background-color: #54B435;
            color: white;
            height: 40px;
            width: 100%; 
        }
    </style>

    <h1 class="welcome-title">Register</h1>
    <p class="sub-title">Silahkan masukkan nama, email, dan kata sandi untuk mendaftar</p><br>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full bg-white font font-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full bg-white font-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full bg-white font-input"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white font-input"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="button-register">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="register-link text-center mt-10 mb-10">
            <span>Sudah memiliki akun?</span>
            <a style="color: #54B435" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
