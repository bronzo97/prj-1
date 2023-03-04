<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center">Elenco proprietà</h2>
    </x-slot>
        <div class="row mt-3 text-center">
            <a href="/inserisciproprieta" class="text-decoration-none">Aggiungi <i class="fa-solid fa-circle-plus"></i></a>
        </div>
    
    <div class="container mt-3">

    @if($errore == 1)
        <div class="row mt-3 text-center alert alert-danger">
            Non è possibile cancellare la proprieta
        </div>
    @endif

        @foreach($proprieta as $prop)
            <div class="row d-flex justify-content-around">
                <label class="col-3">{{ $prop->codice_fiscale }}</label>
                <label class="col-3">{{ $prop->targa }}</label>
                @if($prop->data_acquisto != '0000-00-00')
                <label class="col-3">{{ DateTime::createFromFormat('Y-m-d', $prop->data_acquisto)->format('d-m-Y') }}</label>
                @endif
                @if($prop->data_vendita != '0000-00-00')
                <label class="col-3">{{ DateTime::createFromFormat('Y-m-d', $prop->data_vendita)->format('d-m-Y') }}</label>
                @endif
        @endforeach
    </div>

</x-app-layout>

