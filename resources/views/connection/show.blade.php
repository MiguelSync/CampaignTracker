{{-- resources/views/connection/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $connection->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow sm:rounded-lg p-6">

                <img src="{{ $connection->url_image }}"
                     alt="{{ $connection->name }}"
                     class="w-64 rounded mb-6">

                <h3 class="text-2xl font-bold mb-6">
                    {{ $connection->name }}
                </h3>

                <form action="{{ route('connection.update', $connection->id) }}"
                      method="POST"
                      class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text"
                               name="name"
                               value="{{ $connection->title }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">URL da Imagem</label>
                        <input type="text"
                               name="url_image"
                               value="{{ $connection->url_image }}"
                               class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Atualizar
                    </button>
                </form>

                <hr class="my-8">

                <form action="{{ route('connection.destroy', $connection->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Tem certeza que deseja deletar este jogo?')"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Deletar
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>