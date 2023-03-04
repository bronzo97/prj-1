<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">Elenco Proprietari</h2>
    </x-slot>
        <div class="row mt-3 text-center">
        <a href="/inserisciproprietario" class="text-decoration-none">Aggiungi <i class="fa-solid fa-circle-plus"></i></a>
        </div>
    
    <div class="container mt-3">
        @foreach($proprietari as $proprietario)
            <div class="row d-flex justify-content-between">
                <label class="col-3">{{ $proprietario->codice_fiscale }}</label>
                <label class="col-3">{{ $proprietario->nome }}</label>
                <label class="col-3">{{ $proprietario->cognome }}</label>
                <label class="col-1">
                    <a href="/modificaproprietario/{{$proprietario->codice_fiscale}}"><i class="fa-solid fa-pen"></i></a>
                </label>    
                <label class="col-1">
                    <a href="/cancellaproprietario/{{$proprietario->codice_fiscale}}" onclick="return confirm('Sei sicuro di voler cancellare {{ $proprietario->nome }} {{ $proprietario->cognome }}?')"><i class="fa-solid fa-circle-minus"></i></a>
                </label>
            </div>
        @endforeach
    </div>

</x-app-layout>