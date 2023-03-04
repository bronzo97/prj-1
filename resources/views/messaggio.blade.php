<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body class="antialiased">
        <form action="{{ url('/') }}" method="get">
        @csrf
            <label for="name">Nome:</label>
            <p>{{session('name')}}</p>
           
            <label for="tel">Telefono:</label>
            <p>{{session('tel')}}</p>
            
            <label for="email">E-mail:</label>
            <p>{{session('email')}}</p>
            
            <label for="mess">Messaggio:</label>
            <p>{{session('mess')}}</p>
           
            <input type="submit" value="Modifica">
        </form>
        
    </body>
</html>