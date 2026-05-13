{{-- resources/views/game/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Jogos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('game.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Adicionar Jogo
                </a>
            </div>

            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($games as $game)
                        <a href="{{ route('game.show', $game->id) }}"
                           class="border rounded-lg p-4 hover:shadow-lg transition">

                            <img src="{{ $game->url_image }}"
                                 alt="{{ $game->name }}"
                                 class="w-full h-48 object-cover rounded">

                            <h3 class="mt-4 text-lg font-semibold text-gray-800">
                                {{ $game->name }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>