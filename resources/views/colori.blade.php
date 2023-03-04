<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">Elenco colori</h2>
    </x-slot>
        <div class="row mt-3 text-center">
        <a href="/inseriscicolore" class="text-decoration-none">Aggiungi <i class="fa-solid fa-circle-plus"></i></a>
        </div>
    
    <div class="container mt-3">
        @foreach($colori as $colore)
            <div class="row d-flex justify-content-around">
                <label class="col-3">{{ $colore->color }}</label>
                <label class="col-1">
                    <a href="/modificacolore/{{$colore->id}}"><i class="fa-solid fa-pen"></i></a>
                </label>
                <label class="col-1">    
                    <a href="/cancellacolore/{{$colore->id}}" onclick="return confirm('Sei sicuro di voler cancellare {{ $colore->color }} ?')"><i class="fa-solid fa-circle-minus"></i></a>
                </label>
            </div>
        @endforeach
    </div>
</x-app-layout>
