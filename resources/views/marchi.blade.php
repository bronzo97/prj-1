<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">Elenco marchi</h2>
    </x-slot>
        <div class="row mt-3 text-center">
            <a href="/inseriscimarchio" class="text-decoration-none">Aggiungi <i class="fa-solid fa-circle-plus"></i></a>
        </div>
    
    <div class="container mt-3">
    @if($errore == 1)
        <div class="row mt-3 text-center alert alert-danger">
            Non è possibile cancellare il Marchio perchè utilizzato nella definizione di un modello
        </div>
    @endif
        @foreach($marchi as $marchio)
            <div class="row d-flex justify-content-around">
                <label class="col-3">{{ $marchio->brand }}</label>
                <label class="col-1">
                    <a href="/modificamarchio/{{$marchio->id}}"><i class="fa-solid fa-pen"></i></a>
                </label>
                <label class="col-1">
                    <a href="/cancellamarchio/{{$marchio->id}}" onclick="return confirm('Sei sicuro di voler cancellare {{ $marchio->brand }} ?')"><i class="fa-solid fa-circle-minus"></i></a>
                </label>
            </div>
        @endforeach
    </div>

</x-app-layout>