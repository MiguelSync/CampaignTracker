<div class="flex flex-col gap-4">
    <div class="flex flex-row gap-4">
        <div>
            <x-text-input wire:model.live="user_name"></x-text-input>
        </div>
        <div>
            <select wire:model.live="status">
                @foreach ($campaignUserStatus as $campaignUserStatusItem)
                    <option value="{{ $campaignUserStatusItem['id'] }}">{{ $campaignUserStatusItem['description'] }}</option>
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
                        <td class="text-center">{{ $campaignuser->role }}</td>
                        <td class="text-center">{{ $campaignuser->status }}</td>
                        <td class="text-center"><a href="{{ route('campaignuser.destroy', $campaignuser->id) }}"><x-danger-button>Remover</x-danger-button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $campaignusers->links() }}
    </div>
</div>
