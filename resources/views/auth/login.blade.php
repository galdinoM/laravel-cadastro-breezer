
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="role" :value="__('Nivel de Acesso')" />
            <select name="role" id="role" class="block mt-1 w-full" required>
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input  id="email" class="block mt-1 w-full fadeIn second" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('register'))
                <a id="register-button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="#">
                    {{ __('Cadastra-se') }}
                </a>
            @endif

            <x-primary-button class="ml-3" id="login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
    $('#role').on('change', function(e) {
        e.preventDefault();
        const role = $('#role').val();
        if (role === 'admin') {
            $('#register-button').attr('href', "{{ route('cadastro-admin') }}");
        } else if (role === 'user') {
            $('#register-button').attr('href', "{{ route('cadastro-user') }}");
        }
    });

    $(document).ready(function() {
        function updateRoleLinksAndEvents(role) {
            if (role === 'admin') {
                $('#register-button').attr('href', "{{ route('cadastro-admin') }}");
            } else if (role === 'user') {
                $('#register-button').attr('href', "{{ route('cadastro-user') }}");
            }

            const loginButton = $('#login-button');
            loginButton.off('click').on('click', function(e) {
                e.preventDefault();
                if (role === 'admin') {
                    $('#login-form').attr('action', "{{ route('cadastro-admin') }}");
                } else if (role === 'user') {
                    $('#login-form').attr('action', "{{ route('cadastro-user') }}");
                }
                $('#login-form').submit();
            });
        }

        const initialRole = $('#role').val();
        updateRoleLinksAndEvents(initialRole);

        $('#role').on('change', function(e) {
            e.preventDefault();
            const role = $('#role').val();
            updateRoleLinksAndEvents(role);
        });
    });
</script>

    </form>
</x-guest-layout>
