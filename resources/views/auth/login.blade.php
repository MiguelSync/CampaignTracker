@extends('layout.index')

@section('content')
<div>
    <form action="" method="POST">
        @csrf
        <div>
            <label for="">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</div>
@endsection