@php
    $isCampaignOwner = auth()->user()->can('isCampaignOwner', $campaign);
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $campaign->title }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col gap-4 justify-center">
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Informações
                    </h2>
                </div>
                <form action="{{ route('campaign.update', $campaign->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-row gap-2">
                            <x-input-label class="flex items-center">Description</x-input-label>
                            <x-text-input :value="$campaign->description" disabled="{{ !$isCampaignOwner }}" name="description" />
                        </div>
                        <div class="flex flex-row gap-2">
                            <x-input-label class="flex items-center">Status</x-input-label>
                            <select name="status" id="status" @disabled(!$isCampaignOwner)">
                                @foreach ($campaignStatus as $campaignStatusItem)
                                    <option value="{{ $campaignStatusItem['id'] }}" @selected($campaign->status == $campaignStatusItem['id'])>{{ $campaignStatusItem['description'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($isCampaignOwner)
                            <div>
                                <x-primary-button>Salvar</x-primary-button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            @if($isCampaignOwner)
                <div class="flex flex-row justify-end">
                    <div>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'modal_campaign_user_create')">Adicionar Jogador</x-primary-button>
                    </div>
                </div>
            @endif
        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-4">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Jogadores
                    </h2>
                </div>
                @include('campaign.modals.campaign_user_create_modal')
                <div class="w-full">
                    <livewire:campaign-user.campaign-user-list 
                        :campaign="$campaign" 
                        :campaignUserStatus="$campaignUserStatus"
                        :campaignUserRole="$campaignUserRole"
                        :isCampaignOwner="$isCampaignOwner"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
