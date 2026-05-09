<div>
    <div>
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
    </div>
    <div>

            <tbody>
                @foreach ($users as $user)
                    {{  $user->name }}
                    <x-danger-button>Deletar</x-danger-button>
                @endforeach
        {{ $users->links() }}
    </div>
</div>
