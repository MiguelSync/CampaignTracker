<div class="flex flex-col gap-4">
    <div class="flex flex-row gap-4">
        <div>
            <x-input-label>Nome:</x-input-label>
            <x-text-input type="text" wire:model.live.debounce.300ms="name" />
        </div>
        <div>
            <x-input-label>E-Mail:</x-input-label>
            <x-text-input type="text" wire:model.live.debounce.300ms="email" />
        </div>
        <div>
            <x-input-label>Playstyle:</x-input-label>
            <select wire:model.live.debounce.300ms="playstyle">
                <option value="">Selecione...</option>
                @foreach ($userPlaystyleList as $userPlaystyleListItem)
                    <option value="{{ $userPlaystyleListItem['id'] }}">{{ $userPlaystyleListItem['description'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex justify-center border border-black-400 rounded-md">
        <table class="w-full">
            <thead>
                <tr class="border border-black-400">
                    <th scope="col" class="text-center border border-black-400 p-2">Nome</th>
                    <th scope="col" class="text-center border border-black-400 p-2">E-Mail</th>
                    <th scope="col" class="text-center border border-black-400 p-2">Playstyle</th>
                    <th scope="col" class="text-center border border-black-400 p-2">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border border-black-400">
                        <td class="text-center border border-black-400 p-4"><a href="{{ route('user.show', $user) }}">{{  $user->name }}</a></td>
                        <td class="text-center border border-black-400 p-4">{{  $user->email }}</td>

                        @foreach ($userPlaystyleList as $userPlaystyleListItem)
                            @if ($userPlaystyleListItem['id'] == $user->playstyle)
                                <td class="text-center border border-black-400 p-4">{{  $userPlaystyleListItem['description'] }}</td>
                            @endif
                        @endforeach
                        <td class="text-center border border-black-400 p-4"><x-danger-button>Deletar</x-danger-button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
