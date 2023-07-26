<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Bem-vindo, usuário 👍</h3>
                    @isset($form)
                        @if ($form === 'cadastro-user')
                            @can('user')
                                @if (isset($users) && count($users) > 0)
                                    <h3>Lista de Usuários:</h3>
                                    <ul>
                                        @foreach ($users as $user)
                                            <li>{{ $user->name }} - {{ $user->email }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Nenhum usuário encontrado.</p>
                                @endif
                            @else
                                <p>Somente o usuário pode acessar.</p>
                            @endcan
                        @endif
                    @endisset
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Deslogar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
