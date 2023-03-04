@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3 text-center">
        <form action="{{ url('automobile') }}" method="POST">
        @csrf
        <input style="display:none" type="text" name="id" value="{{$automobile->targa}}" readonly> <br>
        <div class="row">
            <div class="col-4"></div>
            <label for="targa" class="col-1 col-form-label">Targa</label>
            <div class="col-3">
                <input type="text" name="targa" minlength="7" maxlength="10" class="form-control @error('targa') is-invalid @enderror" value="{{ old('targa') ?? $automobile->targa}}" {{($automobile->targa) ? ("readonly") : ("")}}> <br>
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
        <!-- select per il marchio
            <div class="row">
            
                <div class="col-4"></div>
                <label for="marchio" class="col-1 col-form-label">Marchio</label>
                <div class="col-3">
                    <select name="marchioid" class="form-control">
                        <option value="0" selected>Selezionare...</option>
                        @foreach($marchi as $marchio)
                            <option value="{{$marchio->id}}" {{($automobile->brand_id == $marchio->id) ? 'selected' : ''}}>{{$marchio->brand}}</option>
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
        -->
        <!-- select per il modello -->
        <div class="row">
        
        <div class="col-4"></div>
        <label for="modello" class="col-1 col-form-label">Modello</label>
        <div class="col-3">
            <select name="modelloid" class="form-control">
                <option value="0" selected>Selezionare...</option>
                @foreach($modelli as $modello)
                    <option value="{{$modello->id}}" {{ ((old('modelloid') ?? $automobile->model_id) == $modello->id) ? 'selected' : '' }}>{{$modello->brand}} - {{$modello->model}}</option>
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

        <!-- select per il colore -->
        <div class="row mt-3">
        
        <div class="col-4"></div>
        <label for="colore" class="col-1 col-form-label">Colore</label>
        <div class="col-3">
            <select name="coloreid" class="form-control">
                <option value="0" selected>Selezionare...</option>
                @foreach($colori as $colore)
                    <option value="{{$colore->id}}" {{((old('coloreid') ?? $automobile->color_id) == $colore->id) ? 'selected' : ''}}>{{$colore->color}}</option>
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