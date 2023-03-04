@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3">
        <form action="{{ url('colore') }}" method="POST">
        @csrf
        <input style="display:none" type="text" name="id" value="{{$colore->id}}" readonly> <br>
        <div class="row">
            <div class="col-4"></div>
            <label for="colore" class="col-1 col-form-label">Colore</label>
            <div class="col-3">
                <input type="text" name="colore" class="form-control @error('colore') is-invalid @enderror" value="{{ old('colore') ?? $colore->color}}"> <br>
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
        </div>
        <div class="text-center mt-3">
        <input class="btn btn-primary" type="submit" value="Salva">
        <a class="btn btn-danger" href="{{ url('automobili') }}">Annulla</a>
        </div>
        </form>
    </div>
    

@endsection