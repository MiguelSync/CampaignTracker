<x-app-layout>
    <a href="{{ route('campaign.index') }}">Voltar</a>
    
    @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <div>{{ $erro }}</div>
        @endforeach
    @endif        
    <form action="{{ route('campaign.store') }}" method="post">
        @csrf
        <div class="flex flex-col">
            <x-input-label for="title">Titulo</x-input-label> 
            <x-text-input name="title"></x-text-input>
        </div>
        <div>
            <label for="">Descrição</label>
            <textarea name="description" id=""></textarea>
        </div>
        <div>
            <label for="">Começo</label>
            <input type="datetime-local" name="started_at" id="">
        </div>
        <div>
            <x-primary-button type="submit">Confirmar</x-primary-button>
        </div>
    </form>
</x-app-layout>
