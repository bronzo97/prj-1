@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3">
        <form action="{{ url('proprietario') }}" method="POST">
        @csrf
        <input style="display:none" type="text" name="id" value="{{$proprietario->codice_fiscale}}" readonly> <br>
        <div class="row">
            <div class="col-4"></div>
            <label for="cf" class="col-1 col-form-label">Codice Fiscale:</label>
            <div class="col-3">
                <input type="text" name="codice_fiscale" class="form-control @error('proprietario') is-invalid @enderror" value="{{ old('codice_fiscale') ?? $proprietario->codice_fiscale}}" {{($proprietario->codice_fiscale) ? ("readonly") : ("")}}> <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
        <div class="col-4"></div>
            <label for="Nome" class="col-1 col-form-label">Nome:</label>
            <div class="col-3">
                <input type="text" name="nome" class="form-control @error('proprietario') is-invalid @enderror" value="{{ old('nome') ?? $proprietario->nome}}"> <br>
            </div>
        </div>
        <div class="row">
        <div class="col-4"></div>
            <label for="cognome" class="col-1 col-form-label">Cognome:</label>
            <div class="col-3">
                <input type="text" name="cognome" class="form-control @error('proprietario') is-invalid @enderror" value="{{ old('cognome') ?? $proprietario->cognome}}"> <br>
            </div>
        </div>
        <div class="text-center mt-3">
        <input class="btn btn-primary" type="submit" value="Salva">
        <a class="btn btn-danger" href="{{ url('proprietari') }}">Annulla</a>
        </div>
        </form>
    </div>
    

@endsection