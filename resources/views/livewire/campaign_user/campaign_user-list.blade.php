<div class="flex flex-col gap-4">
    <div class="flex flex-row gap-4">
        <div>
            <x-input-label>Nome:</x-input-label>
            <x-text-input wire:model.live.debounce.300ms="userName" type="text"></x-text-input>
        </div>
        <div>
            <x-input-label>Status:</x-input-label>
            <select wire:model.live.debounce.300ms="status">
                <option value="">All</option>
                @foreach ($campaignUserStatus as $campaignUserStatusItem)
                    <option value="{{ $campaignUserStatusItem['id'] }}">{{ $campaignUserStatusItem['description'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label>Cargo:</x-input-label>
            <select wire:model.live.debounce.300ms="role">
                <option value="">All</option>
                @foreach ($campaignUserRole as $campaignUserRoleItem)
                    <option value="{{ $campaignUserRoleItem['id'] }}">{{ $campaignUserRoleItem['description'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="justify-center">
        <table class="w-full border-separate border-spacing-y-4">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Usuário</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaignUsers as $campaignUser)
                    <tr class="border-black border-solid border">
                        <td class="text-center"><a href="{{ route('profile.edit', $campaignUser->user) }}">{{ $campaignUser->user->name }}</a></td>
                        <td class="text-center">{{ $campaignUser->role->description() }}</td>
                        <td class="text-center">{{ $campaignUser->status->description() }}</td>
                        
                        @if($isCampaignOwner)
                            <td class="text-center">
                                <form action="{{ route('campaignuser.destroy', $campaignUser->id) }}", method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit">Remover</x-danger-button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $campaignUsers->links() }}
</div>
