<x-guest-layout>
    <form method="POST" action="{{ route('cadastro-user') }}" class="w-full max-w-lg mx-auto">
        <input type="hidden" name="role" value="{{ $role }}">
        @csrf

        <!-- Nome -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mb-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" required autofocus autocomplete="telefone" />
        </div>

        <!-- Endereço de email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirme sua senha -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
<br />

        <!-- CAMPOS DO BUSCA DO CEP -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- CEP -->
            <div class="mt-4">
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required />
                <x-input-error :messages="$errors->get('cep')" class="mt-2" />
            </div>

            <!-- Logradouro -->
            <div class="mt-4">
                <x-input-label for="logradouro" :value="__('Logradouro')" />
                <x-text-input id="logradouro" class="block mt-1 w-full" type="text" name="logradouro" :value="old('logradouro')" required />
                <x-input-error :messages="$errors->get('logradouro')" class="mt-2" />
            </div>

            <!-- Complemento -->
            <div class="mt-4">
                <x-input-label for="complemento" :value="__('Complemento')" />
                <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')" />
                <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
            </div>

            <!-- Bairro -->
            <div class="mt-4">
                <x-input-label for="bairro" :value="__('Bairro')" />
                <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')" required />
                <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
            </div>

            <!-- Cidade -->
            <div class="mt-4">
                <x-input-label for="localidade" :value="__('Localidade')" />
                <x-text-input id="localidade" class="block mt-1 w-full" type="text" name="localidade" :value="old('localidade')" required />
                <x-input-error :messages="$errors->get('localidade')" class="mt-2" />
            </div>

            <!-- UF (Unidade Federativa) -->
            <div class="mt-4">
                <x-input-label for="uf" :value="__('UF')" />
                <x-text-input id="uf" class="block mt-1 w-full" type="text" name="uf" :value="old('uf')" required />
                <x-input-error :messages="$errors->get('uf')" class="mt-2" />
            </div>

        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}"></a>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
