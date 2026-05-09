<div>
    <div class="w-full h-full">
        <x-text-input class="block mt-1 w-full" type="text" name="name" />
    </div>
    <div class="w-full h-full">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{  $user->name }}</td>
                        <td><x-danger-button>Deletar</x-danger-button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
