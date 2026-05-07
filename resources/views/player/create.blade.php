@if ($errors->any())
    @foreach ($errors->all() as $erro)
        <div>
            {{ $erro }}
        </div>
    @endforeach
    
@endif

<div>
    <form action="{{ 'store' }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="playstyle">Playstyle:</label>
            <select name="playstyle" id="playstyle">
                <option value=1>Casual</option>
                <option value=2 >Hardcore</option>
            </select>
        </div>
        <div>
            <label for="bio">Bio:</label>
            <textarea name="bio" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</div>
