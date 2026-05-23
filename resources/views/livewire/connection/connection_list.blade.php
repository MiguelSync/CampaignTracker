<div class="flex flex-col gap-4">
    <div class="flex flex-row gap-4">
        <div>
            <x-input-label>Título:</x-input-label>
            <x-text-input type="text" wire:model.live.debounce.300ms="title" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($connections as $connection)
            <a href="{{ route('connection.show', $connection->id) }}" class="border rounded-lg p-4 hover:shadow-lg transition">
                <img src="{{ $connection->url_image }}" alt="{{ $connection->title }}" class="w-full h-48 object-cover rounded">
                <h3 class="mt-4 text-lg font-semibold text-gray-800">{{ $connection->title }}</h3>
            </a>
        @endforeach
    </div>
</div>
