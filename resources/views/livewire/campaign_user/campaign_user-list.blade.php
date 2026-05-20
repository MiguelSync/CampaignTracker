<div class="flex flex-col gap-4">
    <div class="flex flex-row gap-4">
        <div>
            <x-text-input wire:model.live="user_name"></x-text-input>
        </div>
        <div>
            <select wire:model.live="status">
                <option value="">All</option>
                @foreach ($campaignUserStatus as $campaignUserStatusItem)
                    <option value="{{ $campaignUserStatusItem['id'] }}">{{ $campaignUserStatusItem['description'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select wire:model.live="role">
                <option value="">All</option>
                @foreach ($campaignUserRole as $campaignUserRoleItem)
                    <option value="{{ $campaignUserRoleItem['id'] }}">{{ $campaignUserRoleItem['description'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="class="justify-center">
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
                @foreach ($campaignusers as $campaignuser)
                    <tr class="border-black border-solid border">
                        <td class="text-center"><a href="{{ route('user.show', $campaignuser->user->id) }}">{{ $campaignuser->user->name }}</a></td>
                        @foreach ($campaignUserRole as $campaignUserRoleItem)
                            @if($campaignUserRoleItem['id'] == $campaignuser->role)
                                <td class="text-center">{{ $campaignUserRoleItem['description'] }}</td>
                            @endif
                        @endforeach
                        @foreach ($campaignUserStatus as $campaignUserStatusItem)
                            @if($campaignUserStatusItem['id'] == $campaignuser->status)
                                <td class="text-center">{{ $campaignUserStatusItem['description'] }}</td>
                            @endif
                        @endforeach
                        
                        @if($isCampaignOwner)
                            <td class="text-center">
                                <form action="{{ route('campaignuser.destroy', $campaignuser->id) }}", method="POST">
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
    <div>
        {{ $campaignusers->links() }}
    </div>
</div>
