<x-modal name="modal_user_connection_create" focusable>
    <form class="flex flex-col justify-center items-center gap-4 p-4" action="{{ route('user_connection.store') }}" method="POST">
        @csrf
        <div>
            <b><h2>Incluir Conexão</h2></b>
        </div>

        <div>
            <x-input-label>Conexão</x-input-label>
            <select name="connection_id" id="connection_id">
                @foreach ($connections as $connection)
                    <option value="{{ $connection->id }}">{{ $connection->title }}</option>
                @endforeach
            </select>
        </div>

       <div>
            <label class="block text-sm font-medium text-gray-700">Descrição</label>
            <input type="text"
                   name="description"
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div class="flex flex-row justify-center items center gap-4">
            <div>
                <x-primary-button>Confirmar</x-primary-button>
            </div>
            <div>
                <x-secondary-button x-on:click.prevent="$dispatch('close')">Cancelar</x-secondary-button>
            </div>
        </div>

    </form>
</x-modal>