<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $campaign->title }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4 justify-center">
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>
        </div>

        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    {{-- <a href="{{ route('') }}"><x-primary-button>{{ __("Adicionar Jogador") }}</x-primary-button></a> --}}
                </div>
                <div class="w-full">
                    <livewire:campaign-user.campaign-user-list 
                        :campaign="$campaign" 
                        :campaignUserStatus="$campaignUserStatus"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
