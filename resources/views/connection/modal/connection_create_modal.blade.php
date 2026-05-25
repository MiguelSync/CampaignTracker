<x-modal name="modal_connection_create" focusable>
    <form class="flex flex-col justify-center items-center gap-4 p-4" action="{{ route('connection.store') }}" method="POST">
        @csrf

        <div>
            <b><h2>Incluir Conexão</h2></b>
        </div>
       <div>
            <label class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text"
                   name="title"
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">URL da Imagem</label>
            <input type="text"
                   name="url_image"
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