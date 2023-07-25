<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @isset($users)
                        @if (count($users) > 0)
                            <h3 class="text-lg font-semibold mb-4">Lista de Usuários:</h3>
                            <div>
                                @foreach ($users as $user)
                                    <x-user-card :user="$user" />
                                @endforeach
                            </div>
                            <script>
                                function formatDate(dateTimeString) {
                                    if (!dateTimeString) return '';

                                    const dateTime = new Date(dateTimeString);
                                    const options = {
                                        year: 'numeric',
                                        month: '2-digit',
                                        day: '2-digit',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    };
                                    return dateTime.toLocaleString('pt-BR', options);
                                }
                            </script>
                        @else
                            <p>Nenhum usuário encontrado.</p>
                        @endif
                    @else
                        <p>Nenhum usuário encontrado.</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
