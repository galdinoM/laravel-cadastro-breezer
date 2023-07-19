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

                    @can('user')
                    @if (isset($users) && count($users) > 0)
                        <h2 class="font-semibold text-x1 text-gray-800 mb-4">Dados dos Usuários</h2>
                        <ul>
                            @foreach ($users as $user)
                                <li>{{ $user->name }} - {{ $user->email }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Bem Vindo!, Usuário.</p>
                    @endif
                    @else
                        <p>Somente o usuário pode acessar.</p>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

