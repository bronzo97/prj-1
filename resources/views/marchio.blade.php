@extends('shared.header')

@section('content')
    <h2 class="text-center">{{$titolo}}</h2>
    <div class="container mt-3">
        <form action="{{ url('marchio') }}" method="POST">
        @csrf
        <!--
        <input style="display:none" type="text" name="id" value="{{$marchio->id}}" readonly> <br>
        -->
        <div class="row">
            <div class="col-4"></div>
            <label for="marchio" class="col-1 col-form-label">Marchio</label>
            <div class="col-3">
                <input type="text" name="marchio" class="form-control @error('marchio') is-invalid @enderror" value="{{ old('marchio') ?? $marchio->brand}}"> <br>
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