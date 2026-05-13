<div>
    <div>
        <x-text-input wire:model.live.debounce.300ms="title"></x-text-input>
    </div>
    <div class="grid grid-cols-3">
        @foreach ($campaigns as $campaign)
            <div>
                <a href="{{ route('campaign.show', $campaign->id) }}">{{$campaign->title}}</a>
                {{$campaign->description}}
            </div>
        @endforeach
    </div>

    {{ $campaigns->links() }}
</div>
