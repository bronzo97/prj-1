<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">Elenco Automobili</h2>
    </x-slot>
        <div class="row mt-3 text-center">
        <a href="/inserisciautomobile" class="text-decoration-none">Aggiungi <i class="fa-solid fa-circle-plus"></i></a>
        </div>
    
    <div class="container mt-3">
        
        @foreach($automobili as $automobile)
            <div class="row d-flex justify-content-between">
                
                <label class="col-3">{{ $automobile->targa }}</label>
                <label class="col-3">{{ $automobile->model }}</label>
                <label class="col-1">{{ $automobile->brand }}</label>
                <label class="col-1">{{ $automobile->color }}</label>
                <label class="col-1">
                    <a href="/modificaautomobile/{{$automobile->targa}}"><i class="fa-solid fa-pen"></i></a>
                </label>
                <label class="col-1">
                    <a href="/cancellaautomobile/{{$automobile->targa}}" onclick="return confirm('Sei sicuro di voler cancellare l\'auto {{ $automobile->model }} targata: {{ $automobile->targa }} ?')"><i class="fa-solid fa-circle-minus"></i></a>
                </label>
            </div>
        @endforeach
    </div>

</x-app-layout>