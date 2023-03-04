@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3">
        <form action="{{ url('modello') }}" method="POST">
        @csrf
        <input style="display:none" type="text" name="id" value="{{$modello->id}}" readonly> <br>
        <div class="row">
            <div class="col-4"></div>
            <label for="modello" class="col-1 col-form-label">Modello</label>
            <div class="col-3">
                <input type="text" name="modello" class="form-control @error('modello') is-invalid @enderror" value="{{ old('modello') ?? $modello->model}}"> <br>

            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <label for="marchio" class="col-1 col-form-label">Marchio</label>
            <div class="col-3">
                <select name="marchioid" class="form-control">
                    <option value="0" selected>Selezionare...</option>
                    @foreach($marchi as $marchio)
                        <option value="{{$marchio->id}}" {{($modello->brand_id == $marchio->id) ? 'selected' : ''}}>{{$marchio->brand}}</option>
                    @endforeach
                </select>
            </div>
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
        <div class="text-center mt-3">
        <input class="btn btn-primary" type="submit" value="Salva">
        <a class="btn btn-danger" href="{{ url('automobili') }}">Annulla</a>
        </div>
        </form>
    </div>
    

@endsection