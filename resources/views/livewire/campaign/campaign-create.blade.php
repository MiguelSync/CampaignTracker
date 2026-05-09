<h1>{{ $title }}</h1>

<a href="{{ route('campaign.index') }}">Voltar</a>

@if ($errors->any())
    @foreach ($errors->all() as $erro)
        <div>{{ $erro }}</div>
    @endforeach
@endif        
<form action="{{ route('campaign.store') }}" method="post">
    @csrf
    <div>
        <label for="">Titulo</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="">Descrição</label>
        <textarea name="description" id=""></textarea>
    </div>
    <div>
        <label for="">Começo</label>
        <input type="datetime" name="started_at" id="">
    </div>
    <div>
        <label for="">Fim</label>
        <input type="datetime" name="ended_at" id="">
    </div>
    <div>
        <button type="submit">Criar</button>
    </div>
</form>