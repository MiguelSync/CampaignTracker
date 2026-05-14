<x-modal name="modal_campaign_user_create" focusable>
    <form class="flex flex-col justify-center items-center gap-4 p-4" action="{{ route('campaignuser.store', $campaign->id) }}" method="POST">
        @csrf

        <div>
            <b><h2>Incluir Jogador</h2></b>
        </div>
        <div>
            <x-text-input name="user_id" id="user_id"></x-text-input>
        </div>
       <div>
            <select wire:model.live="status" name="status" id="status">
                @foreach ($campaignUserStatus as $campaignUserStatusItem)
                    <option value="{{ $campaignUserStatusItem['id'] }}">{{ $campaignUserStatusItem['description'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select wire:model.live="role" name="role" id="role">
                @foreach ($campaignUserRole as $campaignUserRoleItem)
                    <option value="{{ $campaignUserRoleItem['id'] }}">{{ $campaignUserRoleItem['description'] }}</option>
                @endforeach
            </select>
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