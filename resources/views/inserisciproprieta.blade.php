@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3 text-center d-flex justify-content-center">
        <form action="{{ url('storeproprieta') }}" method="POST">
        @csrf

        <div class="row m-3">
            <!-- Select auto-modello -->
            <label for="auto" class="col col-form-label">Seleziona un auto</label>
            <div class="col">
                <select name="automobileid" class="form-control">
                    <option value="0" selected>Selezionare...</option>
                    @foreach($proprieta as $prop)
                        <option value="{{$prop->targa}}" {{ (old('automobileid') == $prop->targa) ? 'selected' : '' }}>
                            {{$prop->targa}} - {{$prop->brand}} - {{$prop->model}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row m-3">
        <!-- Select acquirente -->
            <label for="acquirente" class="col col-form-label">Seleziona un acquirente</label>
            <div class="col">
                <select name="acquirenteid" class="form-control">
                    <option value="0" selected>Selezionare...</option>
                    @foreach($acquirenti as $acquirente)
                        <option value="{{$acquirente->codice_fiscale}}" {{ (old('automobileid') == $acquirente->codice_fiscale) ? 'selected' : '' }}>
                            {{$acquirente->nome}} - {{$acquirente->cognome}}
                        </option>
                    @endforeach
                </select>
        </div>
        <div class="row">
            <div class="text-center mt-3">
                <input class="btn btn-primary" type="submit" value="Compra">
                <a class="btn btn-danger" href="{{ url('proprieta') }}">Annulla</a>
            </div>    
        </div>
        </form>
    </div>
    

@endsection