<section class="flex flex-col gap-4">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Connections') }}
        </h2>
    </header>

    <div class="flex flex-col gap-4">
        @foreach ($user->connections as $userConnection)
            <div class="flex flex-row gap-4 w-full items-center">
                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                    <img src="{{ $userConnection->connection->url_image }}" alt="connection_img" class="w-full h-10 object-cover rounded">
                </div>
        
                @if ($isUserLoggedProfile)
                    <form action="{{ route('user_connection.update', $userConnection->id) }}" method="POST">
                        @csrf
                        @method('PUT')
    
                        <div class="flex flex-row gap-4 items-center">
                            <div>
                                <x-text-input :value="old('description', $userConnection->description)" name="description" id="description"></x-text-input>
                            </div>
                            <div>
                                <x-primary-button>Salvar</x-primary-button>
                            </div>
                        </div>
                    </form>
                    <div>
                        <form action="{{ route('user_connection.destroy', $userConnection->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>Deletar</x-danger-button>
                        </form>
                    </div>
                @else
                    <div>
                        <x-text-input :value="old('description', $userConnection->description)" name="description" id="description"></x-text-input>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    
    @if ($isUserLoggedProfile)
        <div class="py-4">
            <button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'modal_user_connection_create')"
                class="flex items-center gap-1.5 px-3 py-1.5 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Adicionar Conexão
            </button>
        </div>

        @include('profile.modal.user_connection_create_modal')
    @endif
</section>