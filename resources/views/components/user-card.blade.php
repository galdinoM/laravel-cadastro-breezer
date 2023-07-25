<div x-data="{ isOpen: false, user: {} }">
    <div>


    <div class="border border-gray-300 p-4 mb-4 rounded-lg">
        <p class="text-lg font-semibold">{{ $user->name }}</p>
        <p class="text-gray-600">{{ $user->email }}</p>
        <button
            @click="isOpen = !isOpen; user = {{ json_encode($user) }}"
            class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none"
        >
            Ver detalhes
        </button>
    </div>
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
            <button @click="isOpen = !isOpen" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Fechar</button>
        </div>
    </div>
</div>
