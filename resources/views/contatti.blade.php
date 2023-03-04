@extends('shared.header')

@section('content')

    <form action="{{ url('link') }}" method="POST">
        @csrf
        <h1>Iscriviti alla nostra newsletter</h1>

            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{session('nome')}}"> <br>

        <label for="nome">Telefono</label>
        <input type="tel" name="telefono" value="{{session('telefono')}}"> <br>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{session('mail')}}"> <br>
        <label for="textarea">Il tuo messaggio</label> <br>
        <textarea name="textarea" cols="40" rows="7">{{session('messaggio')}}</textarea> <br>
        <input type="submit" value="Invia messaggio">
        
    </form>

@endsection
