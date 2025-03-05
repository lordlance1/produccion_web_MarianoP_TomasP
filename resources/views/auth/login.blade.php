<x-guest-layout>
    <x-auth-session-status class="mb-4 text-red-300" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="text-red-100">
        @csrf

        <h2 class="text-center text-lg font-semibold mb-4 text-red-100">Inicio de Sesión</h2>

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-red-100" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-800 bg-opacity-20 text-red-100 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-red-100" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-800 bg-opacity-50 text-red-100 rounded-md" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center text-red-100">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-800 border-gray-700 text-red-500 shadow-sm focus:ring-red-500" name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-red-100 hover:text-red-400" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif

    <div class="flex items-center justify-between mt-4">
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-4 py-2 mr-2">
                {{ __('Register') }}
            </a>
        @endif
        
        <x-primary-button class="bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg px-4 py-2">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
    </form>
    
</x-guest-layout>

<div class="fixed bottom-4 right-4 flex flex-col space-y-2">
    <a href="{{ route('contacto') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        contactenos 
    </a>
    <a href="{{ route('info') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
        acerca de nosotros
    </a>
</div>
