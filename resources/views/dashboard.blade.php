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

                            <div x-data="{ isOpen: false, user: {} }">
                                <div class="border border-gray-300 p-4 mb-4 rounded-lg">
                                    <p class="text-lg font-semibold">{{ $user->name }}</p>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                    <button
                                        @click="isOpen = true; user = {{ json_encode($user) }}"
                                        class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none"
                                    >
                                        Ver detalhes
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div @click.away="isOpen = false" class="bg-white p-4 rounded-lg shadow-md">
                                        <p class="text-lg font-semibold" x-text="user.name"></p>
                                        <p class="text-gray-600" x-text="user.email"></p>
                                        <p class="text-gray-600" x-text="user.telefone ? 'Telefone: ' + user.telefone : ''"></p>
                                        <p class="text-gray-600" x-text="user.cep ? 'CEP: ' + user.cep : ''"></p>
                                        <p class="text-gray-600" x-text="user.logradouro ? 'Logradouro: ' + user.logradouro : ''"></p>
                                        <p class="text-gray-600" x-text="user.complemento ? 'Complemento: ' + user.complemento : ''"></p>
                                        <p class="text-gray-600" x-text="user.bairro ? 'Bairro: ' + user.bairro : ''"></p>
                                        <p class="text-gray-600" x-text="user.uf ? 'UF: ' + user.uf : ''"></p>
                                        <p class="text-gray-600" x-text="user.localidade ? 'Localidade: ' + user.localidade : ''"></p>
                                        <p class="text-gray-600" x-text="user.updated_at ? 'Data/Hora: ' + formatDate(user.updated_at) : ''"></p>
                                        <button @click="isOpen = false" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Fechar</button>
                                    </div>
                                </div>
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
