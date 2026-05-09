<h1>{{ $title }}</h1>

<div>
    <h2>{{ $campaign->title }}</h2>
    <h2>{{ $campaign->description }}</h2>
    <h2>{{ $campaign->started_at }}</h2>
    @if ($campaign->ended_at != '')
        <h2>{{ $campaign->ended_at }}</h2>
    @endif
</div>