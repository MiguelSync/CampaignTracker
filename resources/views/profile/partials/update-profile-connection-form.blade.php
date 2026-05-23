<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Connections') }}
        </h2>
    </header>

    @foreach ($user->connections as $userConnection)
            <form class="flex flex-row gap-4" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <div>
                    <img src="{{ $userConnection->connection->url_image }}" alt="connection_img">
                </div>
                <div>
                    <x-text-input :value="old('description', $userConnection->description)"></x-text-input>
                </div>
                <div>
                    <x-primary-button>Salvar</x-primary-button>
                </div>
            </form>
    @endforeach
</section>