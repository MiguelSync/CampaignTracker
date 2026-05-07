<div>
    <div>
        <h2>Filtros:</h2>
        <div>
            <input type="text" wire:model.live.debouce.50ms="name" placeholder="teste">
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{  $player->name }}</td>
                    <td>{{  $player->email }}</td>
                    <td><Button wire:click="delete({{ $player->id }})" wire:confirm="teste">Deletar</Button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
