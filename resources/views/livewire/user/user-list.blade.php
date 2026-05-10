<div>
    <div class="w-full h-full">
        <x-text-input class="block mt-1" type="text" name="name" />
    </div>
    <div class="w-full h-full">
        <table class="table-auto border-b">
            <thead>
                <tr class="border-b">
                    <th>Nome</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td><a href="{{ route('user.show', $user) }}">{{  $user->name }}</a></td>
                        <td><x-danger-button>Deletar</x-danger-button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
