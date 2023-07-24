<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Usuário ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @isset($form)
                    @if ($form === 'cadastro-user')
                        @can('user')
                            @if (isset($users) && count($users) > 0)
                            @else
                                <p>Nenhum usuário encontrado.</p>
                            @endif
                        @else
                            <p>Somente o usuário pode acessar.</p>
                        @endcan
                    @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
