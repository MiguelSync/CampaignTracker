<h1>{{ $title }}</h1>

<a href="{{ route('campaign.create') }}">Criar Campanha</a>

@foreach ($campaign as $campaigns)
    <div class="boxCampaign">
        {{$campaigns->title}}
        {{$campaigns->description}}
        <a href="{{ route('campaign.show', $campaigns->id) }}">Detalhes</a>
    </div>
@endforeach