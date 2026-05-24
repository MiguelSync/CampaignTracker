<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Conexões
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'modal_connection_create')"
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Adicionar Conexão
                </button>
            </div>

            @include('connection.modal.connection_create_modal')

            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <livewire:connection.connection-list/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
